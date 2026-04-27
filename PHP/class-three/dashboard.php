<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ./login.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            padding: 40px;
            background-color: rgb(203, 218, 243);
            display: flex;
            flex-direction: column;
            gap:50px; 
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            width: 100%;
        }

        nav a {
            font-size: 22px;
            text-decoration: none;
            margin-right: 20px;
        }

        button{
            padding: 14px 22px;
            color: white;
            background-color: purple;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .greeting{
            font-size: 24px;
            color:purple;
        }

        .welcome{
            font-size: 28px;
            text-align: center;
        }

        #home,#about{
            /* padding: 40px;    */
            font-size: 22px;
        }
    
    </style>
</head>

<body>
    <header>
        <nav>
            <a href="#home">Home</a>
            <a href="#about">About</a>
        </nav>

        <div>
             <button id="logout">Logout</button>
        </div>
    </header>
    <main>
        
        <h3 class="greeting">Hello, <?php echo $_SESSION['username']; ?></h3>
        <h1 class="welcome">Welcome to Digital Library!!</h1>

        <section id="home">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus saepe ex velit beatae deleniti, aspernatur dolore exercitationem. Architecto, eum illo?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi maiores sequi adipisci provident, est nobis iste minima soluta officia nam?Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum officia minima autem atque quibusdam porro eaque, earum quo. Voluptatibus vero, dolorem sed provident quisquam rem? Provident ipsum, ut culpa dolorum fugit illo minus eligendi mollitia, consequatur accusantium officia vero? Esse, quo architecto! Saepe libero reprehenderit voluptates recusandae. Perferendis, consequatur nulla.</p>
        </section>

        <section id="about">
            <h1 class="welcome">About</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus saepe ex velit beatae deleniti, aspernatur dolore exercitationem. Architecto, eum illo?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi maiores sequi adipisci provident, est nobis iste minima soluta officia nam?Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum officia minima autem atque quibusdam porro eaque, earum quo. Voluptatibus vero, dolorem sed provident quisquam rem? Provident ipsum, ut culpa dolorum fugit illo minus eligendi mollitia, consequatur accusantium officia vero? Esse, quo architecto! Saepe libero reprehenderit voluptates recusandae. Perferendis, consequatur nulla.</p>
        </section>
    </main>

</body>

<script>
    const logout = document.getElementById("logout");
    logout.addEventListener('click', () => {
        window.location.href = './logout.php';
    })
</script>

</html>