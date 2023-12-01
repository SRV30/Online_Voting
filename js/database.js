var mysql = require('mysql2');
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: ""
});
con.connect(function(err){
    if (err) throw err;
    console.log("connected!");
    con.query("CREATE DATABASE iElection", function(err, result){
        if (err) throw err;
        console.log("Database created");
    });
});
