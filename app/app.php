<?php

	require_once __DIR__.'/../vendor/autoload.php';
	require_once __DIR__.'/../src/League.php';
	require_once __DIR__.'/../src/Pickup.php';
	require_once __DIR__.'/../src/Sport.php';
	require_once __DIR__.'/../src/User.php';

	$server = 'mysql:host=localhost:8889;dbname=sportal';
	$username = 'root';
	$password = 'root';
	$DB = new PDO($server, $username, $password);

	use Symfony\Component\HttpFoundation\Request;

	Request::enableHttpMethodParameterOverride();

    // instantiate Silex app, add twig capability to app
    $app = new Silex\Application();
    use Symfony\Component\Debug\Debug;

	$app['debug'] = true;

	$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

	// HOMEPAGE ROUTES
	$app->get("/", function() use ($app) {
        //home page
        return $app['twig']->render('index.html.twig');
    });

	$app->get("/pickups", function() use ($app) {
        $pickups = Pickup::getall();
        return $app['twig']->render('pickups.html.twig', array('pickups' => $pickups));
    });

	$app->get("/leagues", function() use ($app) {
		$leagues = League::getall();
		return $app['twig']->render('leagues.html.twig', array('leagues' => $leagues));
	});

	//PICKUP PAGE ROUTES
	$app->post("/pickups/add", function() use ($app) {
		$pickup_name = $_POST['pickup_name'];
		$sport_id = $_POST['sport_id'];
		$location = $_POST['location'];
		$date_time = $_POST['date_time'];
		$recurring = $_POST['recurring'];
		$skill_level = $_POST['skill_level'];
		$description = $_POST['description'];
		$email = $_POST['email'];
		$pickup = new Pickup($pickup_name, $sport_id, $location, $date_time, $recurring, $skill_level, $description, $email, $id = null);
		var_dump($pickup);
		$pickup->save();
		$pickups = Pickup::getAll();
        return $app['twig']->render('pickups.html.twig', array('pickups' => $pickups));
    });


	// LEAGUE PAGE ROUTES
	$app->post("/leagues/add", function() use ($app) {
		$league_name = $_POST['league_name'];
		$sport_id = $_POST['sport_id'];
		$price = $_POST['price'];
		$location = $_POST['location'];
		$skill_level = $_POST['skill_level'];
		$website = $_POST['website'];
		$description = $_POST['description'];
		$email = $_POST['email'];
		$org_id = $_POST['org_id'];
		$league = new League($league_name, $sport_id, $price, $location, $skill_level, $description, $website, $email, $org_id, $id = null);
		$league->save();
		var_dump($league);
		$leagues = League::getAll();
        return $app['twig']->render('leagues.html.twig', array('leagues' => $leagues));
    });

	return $app;

?>
