<?php

namespace dashboard\models;

use common\models\ReportQueue;
use Exception;
use Yii;
use yii\base\BaseObject;
use yii\queue\JobInterface;

class CreateCsvJob extends BaseObject implements JobInterface
{
    public $reportId;
    public $filteredData;
    public function execute($queue)
    {

        $reportModel = ReportQueue::findOne($this->reportId);
        $reportModel->status = ReportQueue::STATUS_PENDING;

        if (!$reportModel) {
            echo "Report not found with ID: {$this->reportId}";
            return;
        }
        try {
            $csvFilePath = $this->generateCsv($this->filteredData, $reportModel->name,$this->reportId);
            $reportModel->path = $csvFilePath;
            $reportModel->status = ReportQueue::STATUS_COMPLETED;
        } catch (Exception $e) {
            $reportModel->status = ReportQueue::STATUS_FAILED;
            $reportModel->error_note = $e->getMessage();
        }

        $reportModel->save();

        echo "Job completed with report ID: {$this->reportId}";


    }

    protected function generateCsv($filteredData, $name,$id)
    {
        $webPath = Yii::getAlias('@dashboard/web/csv/');

        $csvFilePath = $webPath . $name . $id . '.csv';

        $file = fopen($csvFilePath, 'w');

        fputcsv($file, ['ID', 'Title', 'Make', 'Model', 'Year', 'Price', 'Mileage', 'Status']);

        foreach ($filteredData as $car) {
            fputcsv($file, [
                $car->id,
                $car->title,
                $car->make,
                $car->model,
                $car->year,
                $car->price,
                $car->mileage,
                $car->status,
            ]);
        }

        fclose($file);

        return '/csv/' . $name . $id . '.csv';
    }
}
