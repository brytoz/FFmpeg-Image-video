
<!DOCTYPE html>
<html lang="US-en">
 <head>
  <meta charset="utf-8">
  <meta content="text/html; charset=ISO-8859-2" http-equiv="Content-Type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>  Video processing  </title> 
  <link href="tailwind/output.css" type="text/css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
 <!-- //ICON -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" type="text/css" href="animate/animate.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css"/>
 <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">

<style type="text/css">
    body {
      min-height: 100vh;
      background: linear-gradient(to right top, #65dfc9, #6cdbeb);
    }
    div .glass {
      background: white;
      min-height: 60vh;
      width: 50%;
      background: linear-gradient(to right bottom, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.3) );
      border-radius:2rem ;
      backdrop-filter: blur(30rem); 
    }
    div .main2 {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 2rem;
    }
    div .tilt{
      margin-top: 0 ;
      justify-content: space-evenly;
      background: linear-gradient(to right bottom, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.3) );
      border-top-left-radius : 2rem;
      border-top-right-radius : 2rem;

    }
    .header {
      background: linear-gradient(to right bottom, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.3) );

    }
    .active{
            background: linear-gradient(to right bottom, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.3) );
             
    }

    div .round{
      min-height: 20vh;
       background: white;
      border-radius: 50%;
      background: linear-gradient(to right bottom, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.3) );
      width: 40%;
      backdrop-filter: blur(30rem); 
    }
 </style>
</head>
<body>
	

	<div class="flex flex-wrap mt-8 mb-24" style="height: 100%;">
	  <div class="w-full md:w-1/2 flex justify-center">
	    <div class="glass shadow-lg h-100">
	    	<form method="post" enctype="multipart/form-data" action="add.php">
	          <div class="tilt p-6 text-xl text-black font-bold shadow">
	          	<div class="text-center">
	          		<input type="file" name="video" id="file"  >
	          		<!-- <button onclick="activeFile()" id="butClick" class="w-full text-white p-2 bg-green-600 rounded-full" style="background: linear-gradient(135deg, #3a8ffe 0%, #9658fe 100%);">Choose a file</button> -->
	          	</div>
	          </div>

	          <div class="p-3 px-6">
	            <div class=" ">
	          		<!-- <img src="" id="preview" class="image rounded-lg " width="100%" height="100%" alt="image" > -->
	            	<video src="" id="preview"   class="video cursor-pointer rounded-lg" height="100%" width="100%" preload="auto" type="video/mp4"  controls loop >
	            			download now
	            	</video>	                   
	            </div>
	            <p></p>	    

	          </div>
	          <div class="px-6">
	             <input type="file" name="image" name="image" class="image" accept="image/*">
		          <div class="text-center mt-2">
		          	<textarea class="resize-none" name="text" cols="35" rows="4" class="w-full" placeholder=" Type something here "></textarea>
		          </div>

              <div class="text-center mb-8 mt-2">
                <button  data-wow-delay=".75s" data-wow-duration="2s" style=""  class="transition duration-500 ease-in-out  transform hover:-translate-y-1 hover:scale-110 wow cursor-none   fadeIn text-gray-900 hover:bg-gray-800 hover:text-white hover:border-gray-800  text-center text-xl  border-2 border-black p-2 px-6 mt-6 rounded-lg"> 
                    <span class="shadow-2xl three ">Learn More</span> 
                </button>
              </div>

		          <div class="text-center mb-8 mt-2">
		          	<input type="submit" name="submit" value="POST" class="text-center w-5/6 bg-green-600 text-white cursor-pointer py-1  font-bold opacity-75 rounded">
		          </div>
	          </div>
	        </form>
	        </div>  
	  </div>
	</div>


	<script type="text/javascript" src="jquery1.11.3.js"></script>
	<script type="text/javascript" src="app.js"></script>
</body>
</html>