<?php
// database Directory all file include
Base::loader('database');

// database class start
class Database{
    // database details
    private $db_host = config::host;
    private $db_user = config::user;
    private $db_pass = config::pass;
    private $db_name = config::name;

    // for function constaint
    private $mysqli = "";
    private $result = array();
    private $conn = false;

    // 1. constructer
    use construct;
    // 2. insert
    use insert;
    // 3. update
    use update;
    // 4. delete
    use delete;
    // 5. select
    use select;
    // 6. pagination
    use pagination;
    // 7. sql query
    use sql;
    // 8. sql table exists
    use tableExits;
    // 9. get restult
    use tableList;
    // 10. get restult
    use result;
    // 11. destructer
    use destruct;
    // 12. call
    use call;
}
// end
?>
