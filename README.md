# Syarah

<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <br>
</p>
<h1 align="center">Syarah – Car Store</h1>

<p>Welcome to <strong>Syarah</strong>, a car store application built using the Yii2 Advanced Project structure. 
This project enables <strong>admins</strong> to manage car listings and <strong>buyers</strong> to browse and purchase vehicles. 
Follow the instructions below to set up and run the project locally.</p>

---

<h2>Table of Contents</h2>
<ul>
  <li><a href="#requirements">Requirements</a></li>
  <li><a href="#installation">Installation</a></li>
  <li><a href="#database-setup">Database Setup</a></li>
  <li><a href="#running-the-project">Running the Project</a></li>
  <li><a href="#creating-admin-user">Creating Admin User</a></li>
  <li><a href="#running-queues">Running Queues</a></li>
  <li><a href="#redis-setup">Redis Setup</a></li>
</ul>

---

<h2 id="requirements">Requirements</h2>
<p>Before getting started, make sure you have the following installed on your machine:</p>
<ul>
  <li>PHP 8.0 or higher</li>
  <li>Composer</li>
  <li>MySQL / MariaDB</li>
  <li>Redis</li>
  <li><strong>Optional:</strong> Homebrew (for Redis installation on Mac)</li>
</ul>

---

<h2 id="installation">Installation</h2>
<p>Follow these steps to clone the project and install dependencies:</p>

<ol>
  <li><strong>Clone the repository from GitHub:</strong>
    <pre><code>git clone &lt;repository_url&gt; syarah
cd syarah
    </code></pre>
  </li>

  <li><strong>Install PHP dependencies using Composer:</strong>
    <pre><code>composer install</code></pre>
  </li>
</ol>

---

<h2 id="database-setup">Database Setup</h2>

<ol>
  <li><strong>Create the "syarah" database:</strong>
    <pre><code>CREATE DATABASE syarah CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;</code></pre>
  </li>
   <li><strong>Change confiq from environments/dev/common/confiq to your username and password:</strong>
    <pre><code> 'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=syarah', 
            'username' => 'syarah', 
            'password' => 'syarah2024',
            'charset' => 'utf8mb4',
        ],</code></pre>
  </li>

  <li><strong>Run Migrations:</strong>
    <pre><code>php yii migrate</code></pre>
  </li>
</ol>

---

<h2 id="running-the-project">Running the Project</h2>
<p>You can run the <strong>Dashboard</strong> and <strong>Storefront</strong> services on different ports as follows:</p>

<ol>
  <li><strong>Start the Dashboard (Admin Panel):</strong>
    <pre><code>php yii serve --port=8082 --docroot=@dashboard/web</code></pre>
  </li>

  <li><strong>Start the Storefront (Client-facing Store):</strong>
    <pre><code>php yii serve --port=8081 --docroot=@storefront/web</code></pre>
  </li>
</ol>

<p>Access the project via:</p>
<ul>
  <li><strong>Dashboard:</strong> <a href="http://localhost:8082" target="_blank">http://localhost:8082</a></li>
  <li><strong>Storefront:</strong> <a href="http://localhost:8081" target="_blank">http://localhost:8081</a></li>
</ul>

---

<h2 id="creating-admin-user">Creating an Admin User</h2>
<p>To create an admin user, run the following command:</p>
<pre><code>php yii signin-admin/index &lt;username&gt; &lt;email@example.com&gt; &lt;password&gt;</code></pre>

<p><strong>Example:</strong></p>
<pre><code>php yii signin-admin/index admin admin@example.com securepassword</code></pre>

---

<h2 id="running-queues">Running Queues</h2>
<p>After added CSV file, you can start the queue worker with:</p>
<pre><code>php yii queue/run</code></pre>

---

<h2 id="redis-setup">Redis Setup</h2>
<p>Redis is required for certain caching and queue functionalities. If you are using <strong>Homebrew</strong> on macOS, start Redis with:</p>
<pre><code>brew services start redis</code></pre>

<p>To stop Redis, use:</p>
<pre><code>brew services stop redis</code></pre>




