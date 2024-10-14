<?php

use yii\db\Migration;

/**
 * Class m241014_121005_add_initial_car_listings
 */
class m241014_121005_add_initial_car_listings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('CarListing', ['title', 'make', 'model', 'year', 'price', 'mileage', 'description', 'status', 'created_at', 'updated_at'], [
            ['2023 Jetour X70 Luxury', 'Jetour', 'X70', 2023, 200000, 56540, 'Luxury SUV with advanced features', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2022 Toyota Camry', 'Toyota', 'Camry', 2022, 220000, 20000, 'Reliable sedan with excellent mileage', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2021 Honda Accord', 'Honda', 'Accord', 2021, 210000, 15000, 'Spacious sedan with modern tech', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2023 Ford F-150', 'Ford', 'F-150', 2023, 250000, 10000, 'Powerful truck for heavy-duty work', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2020 Tesla Model 3', 'Tesla', 'Model 3', 2020, 300000, 5000, 'Electric car with autopilot capabilities', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2021 Chevrolet Silverado', 'Chevrolet', 'Silverado', 2021, 280000, 12000, 'Durable truck with high towing capacity', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2022 BMW X5', 'BMW', 'X5', 2022, 400000, 8000, 'Luxury SUV with premium features', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2021 Audi A4', 'Audi', 'A4', 2021, 350000, 10000, 'Elegant sedan with great performance', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2023 Kia Telluride', 'Kia', 'Telluride', 2023, 290000, 5000, 'Family SUV with spacious interior', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2020 Subaru Outback', 'Subaru', 'Outback', 2020, 230000, 15000, 'All-wheel drive wagon with off-road capability', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2022 Nissan Rogue', 'Nissan', 'Rogue', 2022, 240000, 11000, 'Compact SUV with great fuel efficiency', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2021 Hyundai Sonata', 'Hyundai', 'Sonata', 2021, 200000, 13000, 'Stylish sedan with advanced safety features', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2022 Mercedes-Benz GLE', 'Mercedes-Benz', 'GLE', 2022, 500000, 4000, 'Luxury SUV with cutting-edge technology', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2023 Mazda CX-5', 'Mazda', 'CX-5', 2023, 320000, 3000, 'Sporty SUV with agile handling', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2021 Volkswagen Jetta', 'Volkswagen', 'Jetta', 2021, 190000, 10000, 'Compact car with efficient performance', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2022 Ford Escape', 'Ford', 'Escape', 2022, 250000, 8000, 'Versatile SUV with plenty of cargo space', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2020 Lexus RX', 'Lexus', 'RX', 2020, 450000, 5000, 'Luxury SUV with refined interior', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2023 Hyundai Elantra', 'Hyundai', 'Elantra', 2023, 210000, 2000, 'Compact sedan with sleek design', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2021 Chrysler Pacifica', 'Chrysler', 'Pacifica', 2021, 300000, 10000, 'Family-friendly minivan with spacious seating', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2022 Jeep Wrangler', 'Jeep', 'Wrangler', 2022, 400000, 7000, 'Off-road SUV with rugged capability', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
            ['2023 Chevrolet Corvette', 'Chevrolet', 'Corvette', 2023, 900000, 3000, 'High-performance sports car', 'available', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241014_121005_add_initial_car_listings cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241014_121005_add_initial_car_listings cannot be reverted.\n";

        return false;
    }
    */
}
