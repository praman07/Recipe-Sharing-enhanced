<?php
session_start();
?>
<html lang="en">
<head>
    
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recipe Sharing Website</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Arial', sans-serif;
      cursor: pointer;
    }

    body {
      background-color: #121212;
      color: #f0f0f0;
      line-height: 1.6;
    }

    header {
      background-color: black;
      padding: 1.5rem;
      box-shadow: 0 8px 10px rgba(255, 0, 0, 1);
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: relative;
      z-index: 10;
    }

    #logo {
      height: 95px;
      box-shadow: 0 8px 10px rgba(255, 0, 0, 1);
      border-radius: 10px;
      transition: 0.5s ease;
    }

    header h2 {
      color: #ff3333;
      text-shadow: 0 0 8px rgba(255, 0, 0, 0.2);
      transition: transform 0.3s ease;
    }

    header h2:hover {
      transform: scale(1.05);
    }

    nav {
      display: flex;
      gap: 1.5rem;
      align-items: center;
    }

    nav a,
    .join {
      color: black;
      text-decoration: none;
      padding: 0.5rem 1rem;
      border-top-left-radius: 10px;
      border-top-right-radius: 999px;
      border-bottom-left-radius: 999px;
      border-bottom-right-radius: 10px;
      background-color: red;
      transition: all 0.3s ease;
      border: 1px solid transparent;
      box-shadow: 0 2px 50px rgba(255, 0, 0, 1);
    }

    nav a:hover,
    .join:hover {
      background-color: #ff3333;
      color: white;
      transform: translateY(-3px);
      box-shadow: 0 9px 15px rgba(255, 0, 0, 1);
      border-top-left-radius: 999px;
      border-top-right-radius: 10px;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 999px;
    }

    nav span {
      color: #ff7777;
      margin-right: 1rem;
    }

    .video-section {
      width:100%;
      height: 0vh;
      position: relative;
      overflow: hidden;
      border-radius: 80px;
      margin: 2rem 0;
    }

    video {
      width: 100%;
      height: 100%;
      object-fit:fill;
      filter: brightness(60%);
      border-radius: 80px;
    }

    video:hover {
      box-shadow: 0 4px 315px rgba(255, 0, 0, 1);
    }

    .video-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      transition: 0.5s;
    }

    .video-text p {
      color: #ff3333;
      font-size: 2.5rem;
    }

    @keyframes spin {
      from {
        transform: rotateY(0deg);
      }
      to {
        transform: rotateY(360deg);
      }
    }

    .section {
      margin-top: 10rem;
      padding: 2rem;
      background-color: #1e1e1e;
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(255, 0, 0, 1);
      transition: 0.5s;
    }

    .section h2 {
      color: #ff3333;
      text-align: center;
      margin-bottom: 1rem;
    }

    .section p,
    .section ul,
    .section li {
      font-size: 1.1rem;
      text-align: center;
      margin-top: 1rem;
      padding: 0.5rem;
      list-style: none;
    }

    .section:hover {
      box-shadow: 0 30px 90px rgba(255, 0, 0, 1);
    }

    footer {
      text-align: center;
      margin-top: 4rem;
      padding: 1.5rem;
      background-color: #000;
      color: #ff7777;
      border-top: 2px solid #ff3333;
    }

    footer a {
      color: #ff7777;
      margin: 0 10px;
    }

    @media (max-width: 768px) {
      header {
        flex-direction: column;
        text-align: center;
      }

      nav {
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 1rem;
      }
    }
  </style>
</head>
<body>
  <header>
    <img id="logo" src="logo.png" />
    <h2>Enjoy the treasure of tasty recipes</h2>
    <nav>
      <?php if (isset($_SESSION['user_id'])): ?>
        <span>Welcome, <?php echo $_SESSION['username']; ?>!</span>
        <a href="post_recipe.php">Post Recipe</a>
        <a href="view_recipes.php">View Recipes</a>
        <a href="logout.php">Logout</a>
      <?php else: ?>
        <a href="signup.php">Sign Up</a>
        <a href="signin.php">Sign In</a>
        <a href="view_recipes.php">View Recipes</a>
      <?php endif; ?>
    </nav>
  </header>

  <section class="video-section">
    <video autoplay muted loop>
      <source src="fire.mp4" type="video/mp4" />
    </video>
    <div class="video-text"></div>
  </section>

  <section class="carousel-section" style="margin-top: 10px; display: flex; justify-content: center;">
    <div style="perspective: 1000px;">
      <div style="width: 300px; height: 300px; position: relative; transform-style: preserve-3d; transform: rotateX(-10deg); animation: spin 25s linear infinite; margin: auto;">
        <?php for ($i = 14; $i <= 28; $i++): ?>
        <img src="<?= $i ?>.jpg" style="position: absolute; width: 100px; height: 150px; border-radius: 15px; top: 50%; left: 50%; transform: rotateY(<?= ($i - 1) * 40 ?>deg) rotateX(-10deg) translateZ(400px) translate(-50%, -50%); box-shadow: 0 30px 90px rgba(255, 0, 0, 1);" />
        <?php endfor; ?>
      </div>
    </div>
  </section>

  <div class="section">
    <h2>Recipe of the Day</h2>
    <p id="suggested-recipe">Loading...</p>
  </div>

<div class="section" id="cooking-tips">
  <h2>Cooking Tips</h2>
  <ul></ul>
</div>

  <section class="video-section">
    <video autoplay muted loop>
      <source src="fire.mp4" type="video/mp4" />
    </video>
    <div class="video-text"></div>
  </section>

  <!-- FAN-STYLE RECIPE CARDS -->
  <section class="carousel-section" style="margin-top: 10px; display: flex; justify-content: center; position: relative;">
    <style>
      .fan-wrapper {
        position: relative;
        width: 1300px;
        height: 320px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        margin-top:15%;
      }

      .card {
        position: absolute;
        width: 130px;
        height: 180px;
        transform-origin: bottom center;
        transition: transform 0.3s ease, left 0.3s ease, top 0.3s ease;
    
      }

      .card-inner {
        width: 100%;
        height: 100%;
        position: relative;
        transform-style: preserve-3d;
        transition: transform 0.6s ease;
        z-index: 1;
      }

       .card:hover {
        left: 50%;
        transform: translateX(-50%) scale(1.5) rotate(0deg) !important;
       height:150px;
       width:130px;
      }

      .card:hover .card-inner {
        transform: rotateY(180deg);
      }
      .card-front, .card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 12px;
        backface-visibility: hidden;
        box-shadow: 0 10px 20px rgba(255, 0, 0, 0.7);
        overflow: hidden;
      }

      .card-back {
        background: linear-gradient(145deg,rgb(0, 0, 0),rgb(255, 0, 1));
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: bold;
        font-size: 1rem;
        border:solid 2px ;
      }

      .card-front {
        transform: rotateY(180deg);
      }

      .card-front img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 12px;
      }

      .deck-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background:rgb(255, 255, 255);
        z-index: 5;
      }

      .deck-title {
        position: absolute;
        bottom: 10px;
        width: 100%;
        text-align: center;
        font-size: 1.8rem;
        color: #ff3333;
        font-weight: bold;
        z-index: 10;
      }
    </style>
    <div class="fan-wrapper">
      <?php for ($i = 1; $i <= 13; $i++): ?>
        <div class="card" style="left: <?= 85 * ($i - 1) + 30 ?>px; transform: rotate(<?= -30 + 5 * ($i - 1) ?>deg); z-index: <?= $i ?>;">
          <div class="card-inner">
            <div class="card-back">??</div>
            <div class="card-front"><img src="<?= $i ?>.jpg" alt="Recipe <?= $i ?>"></div>
          </div>
        </div>
      <?php endfor; ?>
      <div class="deck-overlay"></div>
      <h3 class="deck-title">Today's Top Dishes</h3>
    </div>
  </section>

  <div class="section">
    <h2>Random Dish For You?</h2>
    <div style="text-align: center;">
      <p>What's your mood ?</p>
     <button class="join" onclick="showResult('spicy')">Lazy & Spicy</button>
<button class="join" onclick="showResult('light')">Fresh & Light</button>

      <p id="quiz-result" style="margin-top: 1rem; color:#ff3333;"></p>
    </div>
  </div>

  <div class="section">
    <h2>About Us</h2>
    <p>Welcome to our Recipe Sharing Platform! Whether you're a professional chef or a home cook, this platform lets you explore, share, and learn amazing recipes from around the world.</p>
  </div>

  <div class="section">
    <h2>Join Us Today</h2>
    <p>Create an account and start your culinary journey. Share your own recipes and connect with food lovers across the globe.</p>
    <a href="signup.php">
      <div style="text-align:center; margin-top: 1rem;">
        <button class="join">Join Now</button>
      </div>
    </a>
  </div>

  <footer>
    <p>&copy;2025 RecipeShare. All rights reserved.</p>
    <button class="join">Instagram</button>
    <button class="join">Facebook</button>
    <button class="join">YouTube</button>
  </footer>
<script>
document.addEventListener("DOMContentLoaded", function () {
  // Random recipes
  const recipes = [
    "Try our spicy Punjabi Chole today!",
    "Indulge in creamy Butter Chicken tonight!",
    "Beat the heat with Aam Panna!",
    "Make crispy Paneer Pakoras in minutes!",
    "Reinvent breakfast with Poha with peanuts!",
    "Classic Masala Dosa with chutney, anyone?",
    "Try out Kashmiri Rogan Josh today!",
    "Cool down with chilled Cucumber Raita!",
    "Mango Lassi — your summer partner!",
    "Street-style Tawa Pulao in 10 mins!",
    "Simple yet tasty Dal Tadka is calling!",
    "Treat yourself with Gajar ka Halwa!",
    "Try homemade Naan with garlic butter!",
    "Love spicy? Go for Schezwan Fried Rice!",
    "Satisfy cravings with Aloo Tikki Burgers!",
    "Make healthy Oats Chilla for dinner!",
    "Craving sweet? Make Rasmalai!",
    "Quick Tandoori Paneer Skewers!",
    "Try Matar Paneer with paratha today!",
    "Try our rich Shahi Paneer with butter naan!",
"Whip up some creamy Matar Mushroom curry!",
"Craving street food? Make homemade Dahi Puri!",
"Warm your soul with spicy Tomato Rasam!",
"Treat yourself with melt-in-mouth Besan Ladoo!",
"Try restaurant-style Kadhai Paneer tonight!",
"Go coastal with Kerala-style Fish Curry!",
"Make quick and crispy Onion Pakoras!",
"Serve Moong Dal Khichdi with pickle & curd!",
"Impress guests with Hyderabadi Dum Biryani!",
"Enjoy a sweet bite of Sandesh from Bengal!",
"Make comforting Lauki Kofta with gravy!",
"Try quick Egg Bhurji with buttered pav!",
"Make Maharashtrian Misal Pav at home!",
"Refresh your day with chilled Jaljeera!",
"Go classic with Punjabi Kadhi Pakora!",
"Roast some Masala Corn for a spicy snack!",
"Try Rava Dhokla with green chutney!",
"Have Litti Chokha from Bihar-style dinner!",
"Relish homemade Puran Poli with ghee!",
"Snack on spicy Samosas with tamarind chutney!",
"Try our rich Shahi Paneer with butter naan!",
"Enjoy South Indian crispy Masala Dosa with sambhar!",
"Spice it up with Chicken Biryani today!",
"Cool down with refreshing Mango Lassi!",
"Treat yourself with homemade Gulab Jamun!",
"Make creamy Palak Paneer with jeera rice!",
"Satisfy cravings with Chilli Paneer dry!",
"Quick fix: Street-style Pav Bhaji!",
"Bite into cheesy Garlic Bread Pizza!",
"Try light and healthy Vegetable Upma!",
"Enjoy Rajasthani Gatte ki Sabzi!",
"Relish the sweetness of Kheer with dry fruits!",
"Snack time? Make spicy Bread Pakora!",
"Have a classic Rajma Chawal lunch!",
"Stuffed Aloo Paratha with curd — always a win!",
"Have you tried Tandoori Chicken at home?",
"Recreate Café-style White Sauce Pasta!",
"Make tasty Moong Dal Chilla for breakfast!",
"Go crunchy with Hakka Noodles and Manchurian!",
"Make festive Malpua with rabri topping!"

  ];

  // Insert random recipe
  const recipeElement = document.getElementById("suggested-recipe");
  if (recipeElement) {
    recipeElement.innerText = recipes[Math.floor(Math.random() * recipes.length)];
  }

  // Random cooking tips
  const tips = [
    "💡 Soak onions in cold water to reduce tears.",
    "💡 Add salt while boiling pasta to enhance flavor.",
    "💡 Use a spoon to peel ginger easily.",
    "💡 Freeze herbs in olive oil in ice trays.",
    "💡 Sprinkle lemon juice to keep fruits fresh.",
    "💡 Use leftover rice to make fried rice.",
    "💡 Roast dry spices before grinding for better flavor.",
    "💡 Use cold butter for flaky pastry.",
    "💡 Add sugar to balance extra spice.",
    "💡 Oil your hands before rolling dough.",
    "💡 Freeze onions before chopping to avoid tears.",
    "💡 Microwave garlic cloves to peel faster.",
    "💡 Toast nuts to unlock deeper flavor.",
    "💡 Use baking soda to soften chickpeas.",
    "💡 Always preheat the oven for best results.",
    "💡 Don’t overcrowd your pan — it steams, not fries.",
    "💡 Let meat rest after cooking for juiciness.",
    "💡 Wash rice till water runs clear to avoid stickiness.",
    "💡 Add ice cubes to curd for instant cooling.",
    "💡 Add a spoon of flour to curd to prevent splitting while cooking.",
    "💡 Add a slice of bread to soften brown sugar.",
"💡 Add a pinch of salt to sweet dishes to enhance flavor.",
"💡 Use rice water to make dough softer.",
"💡 Keep bananas fresh longer by wrapping the stem in foil.",
"💡 Rub hands with lemon to remove garlic smell.",
"💡 Use yogurt instead of cream for a healthy twist.",
"💡 Add curry leaves at the end to preserve aroma.",
"💡 Store ginger in the freezer for longer shelf life.",
"💡 Always taste as you cook to balance flavors.",
"💡 Use a pressure cooker to save gas and time.",
"💡 Store tomatoes stem-side down to keep fresh.",
"💡 Add ghee to dal at the end for rich flavor.",
"💡 Use lukewarm water to activate yeast faster.",
"💡 Always sift flour for softer rotis and cakes.",
"💡 Boil potatoes with skin for easy peeling.",
"💡 Use vinegar to clean vegetables naturally.",
"💡 Rinse noodles with cold water to prevent sticking.",
"💡 Use jaggery instead of sugar in Indian sweets.",
"💡 Toast spices lightly to unlock aroma before grinding.",
"💡 Always read the full recipe before starting.",
"💡 Clean as you go to stay organized in the kitchen.",
"💡 Use fresh herbs for maximum aroma and taste.",
"💡 Taste your food at every stage of cooking.",
"💡 Soak rice for 20–30 minutes before cooking for fluffier texture.",
"💡 Use a damp towel under your chopping board to prevent slipping.",
"💡 Toast whole spices to intensify their flavor before grinding.",
"💡 Let your dough rest to make softer rotis or parathas.",
"💡 Store nuts in the fridge to prevent them from going rancid.",
"💡 Crush garlic with the side of a knife for faster peeling.",
"💡 Add a pinch of sugar to tomato-based dishes to balance acidity.",
"💡 Always use a sharp knife — it's safer and more efficient.",
"💡 Don’t flip food too often while cooking — let it sear properly.",
"💡 Use ghee for richer flavor in Indian cooking.",
"💡 Add lemon juice at the end to retain Vitamin C.",
"💡 Avoid washing mushrooms — wipe them with a damp cloth.",
"💡 Store coriander in paper towel to keep it fresh longer.",
"💡 Use stale bread for making breadcrumbs at home.",
"💡 Chill your mixing bowl for perfect whipped cream.",
"💡 Cut citrus fruits crosswise for maximum juice.",
"💡 Use a pinch of turmeric in rice for a golden glow.",
"💡 Smear oil on grater before grating cheese to prevent sticking.",
"💡 Add salt to boiling water to keep green veggies vibrant.",
"💡 Reuse boiled pasta water to enhance sauce texture.",
"💡 Let cake cool before removing from pan to prevent breaking.",
"💡 For crispy dosa, use a mix of rice flour and maida.",
"💡 Add mint leaves to water for natural flavoring.",
"💡 To remove bitterness from karela, rub with salt and rinse.",
"💡 Dry roast semolina before using in upma for better texture.",
"💡 Keep butter at room temperature before baking cookies.",
"💡 Use a lemon wedge to clean a greasy stovetop.",
"💡 Don't open oven door too often — it lowers the temperature.",
"💡 Add a clove to rice while boiling for fragrance.",
"💡 Don’t overmix batter — it makes cakes dense.",
"💡 Use mustard oil for authentic Bengali dishes.",
"💡 Keep a bowl of vinegar in the kitchen to absorb odors.",
"💡 Add a piece of raw potato to fix over-salted curry.",
"💡 Simmer spices in oil first to unlock full flavor.",
"💡 Add a spoon of curd to soften dough naturally.",
"💡 Make soft idlis by adding poha to the batter."


  ];

  const tipsContainer = document.querySelector("#cooking-tips ul");
  if (tipsContainer) {
    const selectedTips = tips.sort(() => 0.5 - Math.random()).slice(0, 4);
    selectedTips.forEach(tip => {
      const li = document.createElement("li");
      li.innerText = tip;
      tipsContainer.appendChild(li);
    });
  }

  // Random dish quiz
  window.showResult = function (type) {
    const quizOptions = {
      spicy: [
        " Chole Bhature 🌶️",
        " Paneer Tikka 🔥",
        " Spicy Rajma Chawal 🍛", "Chole Bhature 🌶️",
"Paneer Tikka 🔥",
"Spicy Rajma Chawal 🍛",
"Tandoori Aloo 😈",
"Schezwan Noodles 🍜",
"Chicken Biryani 🍗",
"Aloo Tikki Chaat 🥔",
"Spicy Misal Pav 🌶️",
"Bhut Jolokia Curry 🔥🔥",
"Kolhapuri Chicken 🍖",
"Kadai Paneer 🌶️",
"Mirchi Bajji 🌶️",
"Garlic Chicken Fry 🧄",
"Spicy Egg Curry 🍳",
"Andhra Fish Curry 🐟",
"Peri Peri Fries 🍟",
"Chettinad Chicken 🍛",
"Tandoori Mushroom 🍄",
"Chilli Paneer 🌶️",
"Pepper Rasam 🍵",

        " Tandoori Aloo 😈",
         "Schezwan Noodles 🍜"
         
      ],
      light: [
        " Fruit Salad 🍓",
        " Cucumber Raita 🥒",
        " Lemon Rice 🍋",
        "Fruit Salad 🍓",
"Cucumber Raita 🥒",
"Lemon Rice 🍋",
"Aam Panna 🥭",
"Veg Soup 🍲",
"Steamed Idlis 🍘",
"Palak Soup 🍃",
"Oats Upma 🌾",
"Boiled Moong Salad 🥗",
"Dhokla 🍥",
"Vegetable Poha 🍛",
"Lettuce Wraps 🥬",
"Sweet Corn Salad 🌽",
"Low-oil Pav Bhaji 🍞",
"Bhel Puri (No Sev) 🍲",
"Khichdi with Ghee 🍚",
"Stuffed Tomatoes 🍅",
"Grilled Zucchini 🥒",
"Beetroot Cutlets ❤️",
"Tomato Cucumber Sandwich 🥪",
        " Aam Panna 🥭",
        " Veg Soup 🍲"
      ]
    };

    const resultSet = quizOptions[type] || quizOptions.spicy;
    const result = resultSet[Math.floor(Math.random() * resultSet.length)];
    document.getElementById("quiz-result").innerText = result;
  };
});
</script>

</body>
</html>
