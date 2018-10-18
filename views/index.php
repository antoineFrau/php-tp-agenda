<!DOCTYPE html>
<html>
    <head>
        <title>Template MVC PHP PDO BOOTSTRAP - Home Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php    
        require_once 'header.html'; 
        ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Agenda</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item <?php echo $_GET["action"] == "home" ? "active" : "";?>">
                    <a class="nav-link" href="?action=home">Home</a>
                </li>
                <li class="nav-item <?php echo $_GET["action"] == "calendar-ro" ? "active" : ""; ?>">
                    <a class="nav-link" href="?action=calendar-ro">Visualisation</a>
                </li>
                <li class="nav-item <?php echo $_GET["action"] == "calendar" ? "active" : ""; ?>">
                    <a class="nav-link" href="?action=calendar">Event</a>
                </li>
                <li class="nav-item <?php echo $_GET["action"] == "users" ? "active" : ""; ?>">
                    <a class="nav-link" href="?action=users">Users</a>
                </li>
                <li class="nav-item <?php echo $_GET["action"] == "links" ? "active" : ""; ?>">
                    <a class="nav-link" href="?action=links">Liens</a>
                </li>
                </ul>
            </div>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <?php 
                if (isset($_GET["action"])) {
                    switch ($_GET["action"]) {
                        case 'calendar-ro':
                            echo '<li class="breadcrumb-item active"><a href="?action=calendar-ro">Visualisation</a></li>';
                            break;
                        case 'calendar':
                            echo '<li class="breadcrumb-item active"><a href="?action=calendar">Event</a></li>';
                            break;
                        case 'users':
                            echo '<li class="breadcrumb-item active"><a href="?action=users">Users</a></li>';
                            break;
                        case 'links':
                            echo '<li class="breadcrumb-item active"><a href="?action=links">Links</a></li>';
                            break;
                        default:
                            require_once 'home.html';
                            break;
                    }
                }
                ?>
            </ol>
        </nav>
        <div class="container">
            <?php 
            if (isset($_GET["action"])) {
                switch ($_GET["action"]) {
                    case 'calendar-ro':
                        require_once 'fullcalendar-ro.html';
                        break;
                    case 'calendar':
                        require_once 'fullcalendar.html';
                        break;
                    case 'users':
                        require_once 'users.html';
                        break;
                    case 'links':
                        require_once 'links.html';
                        break;
                    default:
                        require_once 'home.html';
                        break;
                }
            }
            ?>
        </div>
        <?php 
            require_once 'footer.html';
        ?>    
        
    </body>
</html>
