<?php

$db_name = 'mysql:host=localhost;dbname=eduon';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $courses = $_POST['courses'];
   $courses = filter_var($courses, FILTER_SANITIZE_STRING);
   $query = $_POST['query'];
   $query = filter_var($query, FILTER_SANITIZE_STRING);
   $gender = $_POST['gender'];
   $gender = filter_var($gender, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact_form` WHERE name = ? AND number = ? AND email = ? AND courses = ? AND query = ? AND gender = ?");
   $select_contact->execute([$name, $number, $email, $courses, $query, $gender]);

   if($select_contact->rowCount() > 0){
      $message[] = 'already sent message!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `contact_form`(name, number, email, courses, query, gender) VALUES(?,?,?,?,?,?)");
      $insert_message->execute([$name, $number, $email, $courses, $query, $gender]);
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>EDUON</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<!-- header section starts  -->

<header class="header">

   <section class="flex">

      <a href="#home" class="logo">eduon.</a>

      <nav class="navbar">
         <a href="#home">home</a>
         <a href="#about">about</a>
         <a href="#courses">courses</a>
         <a href="#teachers">teachers</a>
         <a href="#reviews">reviews</a>
         <a href="#contact">contact</a>
         <a href="logout.php">Logout</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

   <div class="row">

      <div class="content">
         <h3>welcome to<span>EduOn</span></h3>
         <a href="#contact" class="btn">contact us</a>
      </div>

      <div class="image">
         <img src="images/homg-img.svg" alt="">
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- couter section stars  -->

<section class="count">

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div class="content">
            <h3>150+</h3>
            <p>courses</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div class="content">
            <h3>1300+</h3>
            <p>students</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div class="content">
            <h3>80+</h3>
            <p>teachers</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-face-smile"></i>
         <div class="content">
            <h3>100%</h3>
            <p>satisfaction</p>
         </div>
      </div>

   </div>

</section>

<!-- couter section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>world’s best faculty, premium learning content and study materials, hands-on experience with industry-relevant case studies.</p>
         <a href="#contact" class="btn">contact us</a>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- courses section starts  -->

<section class="courses" id="courses">

   <h1 class="heading">our <span>courses</span></h1>

   <div class="swiper course-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/course-1.svg" alt="">
            <h3>web development</h3>
            <p>Become a Certified Web Developer!</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/course-2.svg" alt="">
            <h3>digital marketing</h3>
            <p>The Complete Digital Marketing Course!</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/course-3.svg" alt="">
            <h3>science</h3>
            <p>Learn the basic science experiments!</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/course-4.svg" alt="">
            <h3>graphic design</h3>
            <p>Become a Professional Graphic Designer!</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/course-5.svg" alt="">
            <h3>teaching</h3>
            <p>Learn how to teach online or offline!</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/course-6.svg" alt="">
            <h3>mechanical engineering</h3>
            <p>Introduction to Mechanical Engineering!</p>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- courses section ends -->

<!-- teachers section starts  -->

<section class="teachers" id="teachers">

   <h1 class="heading">expert <span>tutors</span></h1>

   <div class="swiper teachers-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/tutor-1.png" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
         </div>
         
         <div class="swiper-slide slide">
            <img src="images/tutor-2.png" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/tutor-3.png" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/tutor-4.png" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/tutor-5.png" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/tutor-6.png" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- teachers section ends -->

<!-- reviews section starts  -->

<section class="reviews" id="reviews">

   <h1 class="heading"> student's <span>reviews</span></h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <p>EduOn provide amazing course for biggner to better understand and implement .Thank you EduOn!</p>
            <div class="user">
               <img src="images/pic-1.png" alt="">
               <div class="user-info">
                  <h3>john deo</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>The course material was well presented, and easy to work along with the lessons.Thank you EduOn!</p>
            <div class="user">
               <img src="images/pic-2.png" alt="">
               <div class="user-info">
                  <h3>john deo</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>Congratulations to myself! I finished the course with lot of knowledge acquired from it.!</p>
            <div class="user">
               <img src="images/pic-3.png" alt="">
               <div class="user-info">
                  <h3>john deo</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>It's been a great experience so far and I'm looking forward to becoming a great front-end-developer!</p>
            <div class="user">
               <img src="images/pic-4.png" alt="">
               <div class="user-info">
                  <h3>john deo</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>It’s a great way to learn on the go and anywhere on any device. The course is explained in detail. I love it!</p>
            <div class="user">
               <img src="images/pic-5.png" alt="">
               <div class="user-info">
                  <h3>john deo</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>The way I understood everything so easily and I am enjoying it alot. Thank you EduOn for your courses!</p>
            <div class="user">
               <img src="images/pic-6.png" alt="">
               <div class="user-info">
                  <h3>john deo</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- reviews section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

   <h1 class="heading"><span>contact</span> us</h1>

   <div class="row">

      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>

      <form action="" method="post">
         <span>your name</span>
         <input type="text" required placeholder="enter your full name" maxlength="50" name="name" class="box">
         <span>your number</span>
         <input type="number" required placeholder="enter your valid number" max="9999999999" min="0" name="number" class="box" onkeypress="if(this.value.length == 10) return false;">
         <span>your email</span>
         <input type="email" required placeholder="enter your valid email" maxlength="50" name="email" class="box">
         <span>select course</span>
         <select name="courses" class="box" required>
            <option value="" disabled selected>select the course --</option>
            <option value="web developement">web developement</option>
            <option value="science and biology">science and biology</option>
            <option value="engineering">engineering</option>
            <option value="digital marketing">digital marketing</option>
            <option value="graphic design">graphic design</option>
            <option value="teaching">teaching</option>
            <option value="social studies">social studies</option>
            <option value="data analysis">data analysis</option>
            <option value="artificial intelligence">artificial intelligence</option>
         </select>
         <span>your query</span>
         <input type="text" required placeholder="enter your query" maxlength="200" name="query" class="box">
         <span>select gender</span>
         <div class="radio">
            <input type="radio" name="gender" value="male" id="male">
            <label for="male">male</label>
            <input type="radio" name="gender" value="female" id="female">
            <label for="female">female</label>
         </div>
         <input type="submit" value="send message" class="btn" name="send">
      </form>

   </div>

</section>

<!-- contact section ends -->

<!-- footer section starts  -->

<footer class="footer">

   <section>

      <div class="share">
         <a href="https://twitter.com/sooaib7" class="fab fa-twitter"></a>
         <a href="https://www.linkedin.com/in/moshuaib" class="fab fa-linkedin"></a>
         <a href="https://youtube.com/c/MohdShuaib" class="fab fa-youtube"></a>
      </div>

      <div class="credit">&copy; copyright @ 2022 by <span>mohd shuaib</span> | all rights reserved!</div>

   </section>

</footer>

<!-- footer section ends -->















<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>