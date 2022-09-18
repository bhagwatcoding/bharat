rule of database
0.  define('db_query', new Database());
1.  db_query->insert('user', ['fname'=> "nitin", 'lname'=> "rathour", 'email'=> 'winfoa.com@gmail.com']);
2.  db_query->update('user', ['lname'=> "sharma"], 'lname = "kumar"');
3.  db_query->delete('user', 'id = "47"');
4.  db_query->sql('SELECT * FROM useremail');
5.  db_query->select('user', '*', null, null, null, "2");
6.  db_query->pagination('user', null, null, "2");
7.  db_query->getResult();
