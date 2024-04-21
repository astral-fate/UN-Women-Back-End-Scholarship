<?php

$name = 'Fatimah Emad Eldin';
$job ='Software Tester';
$location ='Madinah, Saudi Arabia';
$email ='fatemah.it@gmail.com';
$number = 966508212226;
$years = 2023-2019;

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resume</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  body, h1, h2, h3, h4, h5, h6 {
    font-family: "Roboto", sans-serif;
  }
  .w3-bar-block .w3-bar-item {
    padding: 20px;
  }
  .w3-text-teal, .w3-hover-text-teal:hover {
    color: #009688!important;
  }
  .w3-teal, .w3-hover-teal:hover {
    background-color: #009688!important;
  }
  .profile-container {
    position: relative;
    text-align: center;
    color: white;
  }
  .profile-container img {
    width: 100%;
    opacity: 0.6;
  }
  .profile-container .profile-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: black;
  }
  .skill, .language {
    margin: 10px 0;
  }
  .skill-bar, .language-bar {
    width: 100%;
    background-color: #e6e6e6;
  }
  .skill-level, .language-level {
    height: 18px; /* Adjust as needed */
    background-color: #009688;
  }
  .fa {
    margin-right: 5px;
  }
  .w3-margin-top {
    margin-top: 16px!important;
  }

  .profile-name {
    position: relative; /* Changed from absolute to relative */
    margin-top: -6em; /* Adjust this value as needed to place the text above the image */
    font-size: 1.5em; /* Adjust this value as needed */
    background: #fff; /* White background to make the text stand out over the image */
    display: inline-block;
    padding: 0.5em 1em; /* Gives some spacing around the text */
    transform: translateX(-50%);
    left: 50%; /* Centers the name */
    color: black;
  }

</style>
</head>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
        <div class="profile-container">
            <!-- This container will hold the name and the image -->
            <div class="profile-name">
              <h3><?php echo $name ?> </h3>
            </div>
            <img src="photo.png" alt="Fatimah Emad Eldin"> 
          </div>
      
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-container">
          <p><i class="fa fa-briefcase fa-fw w3-large w3-text-teal"></i><?php echo $job ?></p>
          <p><i class="fa fa-home fa-fw w3-large w3-text-teal"></i><?php echo $location ?> </p>
          <p><i class="fa fa-envelope fa-fw w3-large w3-text-teal"></i><?php echo $email ?></p>
          <p><i class="fa fa-phone fa-fw w3-large w3-text-teal"></i><?php echo $number ?> </p>
          <hr>
          
          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
          <p>Data Analysis</p>
          <div class="w3-light-grey skill-bar">
            <div class="w3-container w3-teal skill-level" style="width:90%"></div>
          </div>
          <p>UI/UX</p>
          <div class="w3-light-grey skill-bar">
            <div class="w3-container w3-teal skill-level" style="width:80%"></div>
          </div>
          <p>Content Writing</p>
          <div class="w3-light-grey skill-bar">
            <div class="w3-container w3-teal skill-level" style="width:75%"></div>
          </div>
          <p>Graphic Design</p>
          <div class="w3-light-grey skill-bar">
            <div class="w3-container w3-teal skill-level" style="width:50%"></div>
          </div>
          <br>

          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
          <p>Arabic</p>
          <div class="w3-light-grey language-bar">
            <div class="w3-container w3-teal language-level" style="width:100%"></div>
          </div>
          <p>English</p>
          <div class="w3-light-grey language-bar">
            <div class="w3-container w3-teal language-level" style="width:55%"></div>
          </div>
          <p>German</p>
          <div class="w3-light-grey language-bar">
            <div class="w3-container w3-teal language-level" style="width:25%"></div>
          </div>
          <br>
        </div>
      </div>
      <br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
     <!-- Right Column -->
<div class="w3-twothird">

    <div class="w3-container w3-card w3-white w3-margin-bottom">
      <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
      
      <div class="w3-container">
        <h5 class="w3-opacity"><b>Software Tester / labayh.com</b></h5>
        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Dec 2023 - Current</h6>
        <p> -	White box and manual testing. <br>  
            -	Test cases documentation using Notion. <br>  
            -	Product and UX quality insurance.<br>  
            -	Smoke, regression, and user-story testing.<br>  
            </p>
        <hr>
      </div>
  
      <div class="w3-container">
        <h5 class="w3-opacity"><b>Technical Trainer/ tctacademy.com</b></h5>
        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Aug 2023- Nov 2023</h6>
        <p>-	Applied artificial intelligence bootcamp. <br>  
            -	Data Visualization Dashboard using Excel. <br>  
            -	Maintenance of hardware and operating system. <br>  
            -	Customization of networking and LANs. <br>  
            -	Database administration using Microsoft Access. <br>  
            </p>
        <hr>
      </div>
  
      <div class="w3-container">
        <h5 class="w3-opacity"><b>User Experience UX Intern / GTW IT Soultion </b></h5>
        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jun 2022 - Mar 2022</h6>
        <p>-	Developed a competitive audit for customers. <br>  
            -	Handled business and technical requirements.  <br> 
            -	Designed web & mobile using Figma.   <br> 
            -	Applied responsive design techniques.  <br> 
            -	Conducted white box testing, manual testing. <br> 
            -	Utilized Local and Flywheel for local hosting. <br>  
            -	Implemented CMS platform WordPress and plugins. <br> 
            </p>
        <hr>
      </div>
  
    </div>
  
    <div class="w3-container w3-card w3-white">
      <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
  
      <div class="w3-container">
        <h5 class="w3-opacity"><b>Um Al-Qura University</b></h5>
        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2024 - Current</h6>
        <p>Master Degree Of computer Science </p>
        <hr>
      </div>
  
      <div class="w3-container">
        <h5 class="w3-opacity"><b>Arab Open University</b></h5>
        <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2019 - 2023 total years (<?php echo $years?>)</h6>
        <p>Bachelor Degree Of Computer Science </p>
        <hr>
      </div>
      
    </div>
    
    <!-- End Right Column -->
  </div>
  
      
      <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>Find me on social media.</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
</footer>

</body>
</html>
