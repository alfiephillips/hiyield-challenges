<html lang="en">
    <head>
        <!-- Default meta data -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Main application title-->
        <title>Hiyield Challenge - Image Gallery</title>

        <!-- Connect Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Base styling -->
        <link href="style.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive container with slight padding for centering-->
        <div class="container mx-auto px-10">
            <!-- Flex wrapper to default to center when a row is not filled -->
            <div class="flex flex-wrap justify-center items-center text-left">
               <!-- 3 Seperate sections, as container gets smaller, the section gets wider and an image occupies the space -->
                <div class="w-auto md:w-1/2 lg:w-1/3 mx-auto my-5">
                    <!-- A border line so the image can stand out, not against a neutral background -->
                    <img class="border-solid border-2 border-white-700" src="https://picsum.photos/300/200" alt="Random Image">
                    <h2>Matt Church</h2>
                    <!-- Text highlighting for external linking -->
                    <p><a href="#" class="text-red-500 hover:text-blue-500">View Portfolio</a></p>
                </div>
                <div class="w-auto md:w-1/2 lg:w-1/3 mx-auto my-5">
                    <img class="border-solid border-2 border-white-700"src="https://picsum.photos/300/200?2" alt="Random Image">
                    <h2>Manuela Redinciuc</h2>
                    <p><a href="#" class="text-red-500 hover:text-blue-500">View Portfolio</a></p>
                </div>
                <div class="w-auto md:w-1/2 lg:w-1/3 mx-auto my-5">
                    <img class="border-solid border-2 border-white-700" src="https://picsum.photos/300/200?3" alt="Random Image">
                    <h2>John Guilding</h2>
                    <p ><a href="#" class="text-red-500 hover:text-blue-500">View Portfolio</a></p>
                </div>
            </div>
        </div>
        
    </body>
</html>