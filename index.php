<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Caveat:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <li><a href="index.php">Home</a></li>
        <li><a href="rajasthanMap.php">Map</a></li>
        <?php if (!(isset($_SESSION["role"]))):?>
            <li><a href="registerPage.php">Register</a></li>
        <?php endif;?>
        <?php if (!(isset($_SESSION["role"]))):?>
            <li><a href="loginPage.php">Login</a></li>
        <?php endif;?>
        <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == 'admin'):?>
            <li><a href="Admin.php">Admin</a></li>
        <?php endif;?>
        <?php if (isset($_SESSION["role"])):?>
            <li><a href="Profile.php">Profile</a></li>
        <?php endif;?>
        <?php if (isset($_SESSION["role"])):?>
            <li><a href="logout.php">Logout</a></li>
        <?php endif;?>
    </nav>
    <div class="center">
        <div class="welcomeText">
            <p id="stateName"><span id="part1">Tharo</span><span id="part2">   RAJASTHAN</span></p>
            <p id="intro">Why Not Try Some Desert....</p>
        </div>
        <div class="jaipur">
            <div class="temperature">
                <p id = cityName>Jaipur</p><p id = "jaipurTemp">TMP</p>
            </div>
            <img src="jaipur.jpeg" alt="Image not found"><br>
            <p id="jaipurLocation">NONE</p>
            <p id="cityAirport"><a>Airport Location:</a> Around 13 km from the city center</p>
            <p id="cityInfo">
                <a>Why You Should Visit Jaipur The Pink City of India</a><br><br>
                Jaipur, the capital of Rajasthan, is a city full of color, history, and culture. Known as the Pink City, Jaipur is famous for its beautiful palaces, ancient forts, vibrant markets, and rich traditions. Whether you're a history lover, a foodie, or just someone who enjoys exploring new places, Jaipur has something for everyone.
                From the majestic Amber Fort and the stunning City Palace, to the iconic Hawa Mahal (Palace of Winds), the architecture here is a treat for the eyes. The city is also home to Jantar Mantar, a UNESCO World Heritage Site that showcases India's scientific achievements in astronomy.
                Beyond the monuments, Jaipur offers amazing street food, colorful local bazaars like Johari Bazaar, and warm Rajasthani hospitality. A visit to Jaipur is not just a trip—it's a journey into India’s royal past.
            </p>
        </div>
        <div class="udaipur">
            <div class="temperature">
                <p id = cityName>Udaipur</p><p id = "udaipurTemp">TMP</p>
            </div>
            <img src="Udaipur.jpg" alt="Image not found"><br>
            <p id="udaipurLocation">NONE</p>
            <p id="cityAirport"><a>Airport Location:</a> Around 22 km from the city center</p></p>
            <p id="cityInfo">
                <a>Why You Should Visit Udaipur The City of Lakes</a><br><br>
                Udaipur, often called the "City of Lakes," is one of the most beautiful and romantic destinations in Rajasthan. Surrounded by the Aravalli hills and filled with picturesque lakes like Lake Pichola and Fateh Sagar, the city offers a peaceful and regal atmosphere that feels almost magical. Udaipur is home to stunning architectural marvels such as the grand City Palace, the charming Jag Mandir, and the iconic Lake Palace, which appears to float in the middle of the water. The city is rich in history and culture, with vibrant markets, traditional Rajasthani art, and cultural performances that give visitors a true taste of the region. Whether you're enjoying a sunset boat ride, exploring narrow alleys lined with colorful handicrafts, or dining on a rooftop overlooking the lake, Udaipur provides a perfect mix of heritage, beauty, and serenity. It's a must-visit for anyone seeking a blend of royal charm and natural splendor.
            </p>
        </div>
        <div class="jodhpur">
            <div class="temperature">
                <p id = cityName>Jodhpur</p><p id = "jodhpurTemp">TMP</p>
            </div>
            <img src="jodhpur.png" alt="Image not found">
            <p id="jodhpurLocation">NONE</p>
            <p id="cityAirport"><a>Airport Location:</a> Around 5 km from the city center</p></p>
            <p id="cityInfo">
                <a>Why You Should Visit Jodhpur The Blue City of India</a><br><br>
                Jodhpur, known as the "Blue City" of India, is a captivating destination that offers a perfect blend of history, culture, and vibrant local life. Dominated by the majestic Mehrangarh Fort, which towers over the city from a rocky hill, Jodhpur enchants visitors with its maze of blue-painted houses, giving the city its nickname. Walking through its narrow lanes, you'll encounter bustling bazaars, traditional Rajasthani architecture, and the warm hospitality of its people. Jodhpur is also home to historical gems like Umaid Bhawan Palace and Jaswant Thada, each echoing tales of royal legacy. With its sunny weather, rich cuisine, and deep cultural roots, Jodhpur is a must-visit for anyone looking to experience the regal charm and authentic flavors of Rajasthan.
            </p>
        </div>
        <div class="jaisalmer">
            <div class="temperature">
                <p id = cityName>Jaisalmer</p><p id = "jaisalmerTemp">TMP</p>
            </div>
            <img src="jaisalmer.jpg" alt="Image not found"><br>
            <p id="jaisalmerLocation">NONE</p>
            <p id="cityAirport"><a>Airport Location:</a> Around 12 km from the city center</p></p>
            <p id="cityInfo">
                <a>Why You Should Visit Jaisalmer The Golden City of India</a><br><br>
                Jaisalmer, often referred to as the "Golden City," is a magical destination rising out of the Thar Desert in Rajasthan. Its iconic yellow sandstone architecture glows under the sun, giving the entire city a golden hue. At the heart of Jaisalmer lies the magnificent Jaisalmer Fort, one of the few living forts in the world, where people still reside and run businesses. The city is known for its intricately carved havelis, such as Patwon Ki Haveli and Salim Singh Ki Haveli, which showcase the artistic brilliance of Rajasthani craftsmanship. Beyond the city, the vast sand dunes of Sam and Khuri offer unforgettable desert safari experiences, complete with camel rides and cultural performances under starlit skies. With its rich history, desert charm, and warm hospitality, Jaisalmer offers a unique glimpse into Rajasthan’s vibrant heritage and desert life.
            </p>
        </div>
    </div>
</body>
<script>
  const apiKey = '9d1a44bc361249b8b9f142439252505'; 
  const cities = ['Jaipur', 'Udaipur', 'Jodhpur', 'Jaisalmer'];

  cities.forEach(city => {
    const apiUrl = `https://api.weatherapi.com/v1/current.json?key=${apiKey}&q=${city}&aqi=no`;

    fetch(apiUrl)
      .then(response => response.json())
      .then(data => {
        const temperature = data.current.temp_c;
        const lat = data.location.lat;
        const lon = data.location.lon;
        console.log(lat);
        console.log(lon);
        const cityId = city.toLowerCase() + 'Temp'; // e.g. jaipurTemp
        const cityId2 = city.toLowerCase() + 'Location';
        document.getElementById(cityId).innerHTML = `${temperature}°C`;
        document.getElementById(cityId2).innerHTML = `Latitude: ${lat}, Longitude: ${lon}`;
      })
      .catch(error => {
        console.error(`Error fetching weather for ${city}:`, error);
        const cityId = city.toLowerCase() + 'Temp';
        const cityId2 = city.toLowerCase() + 'Location';
        document.getElementById(cityId).innerText = 'TMP';
        document.getElementById(cityId2).innerText = 'NONE';
      });
  });
</script>
</html>