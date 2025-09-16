<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
</head>
<style>

/* Reset */
body, h1, h2, p, ul, li, a {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* General styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f5f7;
    color: #333;
}

.admin-container {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

/* Header styles */
.admin-header {
    background-color: #2d89ef;
    color: #fff;
    padding: 20px;
    text-align: center;
}

.admin-header h1 {
    font-size: 24px;
    margin-bottom: 10px;
}

.admin-nav {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 15px;
}

.admin-nav a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
    padding: 5px 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.admin-nav a:hover {
    background-color: #1e5cb8;
}

/* Main content */
.admin-main {
    flex: 1;
    padding: 20px;
}

.card-container {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    justify-content: center;
}

.card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 300px;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}

.card h2 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #2d89ef;
}

.card p {
    font-size: 14px;
    color: #666;
}

/* Footer styles */
.admin-footer {
    background-color: #2d89ef;
    color: #fff;
    text-align: center;
    padding: 10px;
    font-size: 14px;
}


</style>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1>Welcome, Admin</h1>
            <nav>
                <ul class="admin-nav">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Users</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </nav>
        </header>

        <main class="admin-main">
            <div class="card-container">
                <div class="card">
                    <h2>Users</h2>
                    <p>Manage and view user accounts.</p>
                </div>
                <div class="card">
                    <h2>Reports</h2>
                    <p>Access detailed reports and analytics.</p>
                </div>
                <div class="card">
                    <h2>Settings</h2>
                    <p>Configure system preferences and options.</p>
                </div>
            </div>
        </main>

        <footer class="admin-footer">
            <p>&copy; 2025 Your Company. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
