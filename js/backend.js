const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const mysql = require('mysql');

// Middleware
app.use(bodyParser.json());

// Database Connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'travel_packages'
});

db.connect((err) => {
    if (err) throw err;
    console.log('Database connected!');
});

// Get All Packages
app.get('/api/packages', (req, res) => {
    const sql = 'SELECT * FROM packages';
    db.query(sql, (err, results) => {
        if (err) throw err;
        res.json(results);
    });
});

// Update Price
app.put('/api/packages/:id', (req, res) => {
    const { id } = req.params;
    const { price } = req.body;
    const sql = 'UPDATE packages SET price = ? WHERE id = ?';
    db.query(sql, [price, id], (err, result) => {
        if (err) throw err;
        res.json({ message: 'Price updated successfully' });
    });
});

// Add New Package
app.post('/api/packages', (req, res) => {
    const package = req.body;
    const sql = 'INSERT INTO packages SET ?';
    db.query(sql, package, (err, result) => {
        if (err) throw err;
        res.json({ message: 'Package added successfully', id: result.insertId });
    });
});

// Delete Package
app.delete('/api/packages/:id', (req, res) => {
    const { id } = req.params;
    const sql = 'DELETE FROM packages WHERE id = ?';
    db.query(sql, [id], (err, result) => {
        if (err) throw err;
        res.json({ message: 'Package deleted successfully' });
    });
});

// Start Server
app.listen(3000, () => {
    console.log('Server running on port 3000');
});
