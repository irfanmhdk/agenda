<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - The Hub</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #222;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #333;
        }
        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        nav a:hover {
            background-color: #575757;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .about-header {
            text-align: center;
            padding: 50px 0;
        }
        .about-header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .about-header p {
            color: #777;
            font-size: 1.2em;
        }
        .staff {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 20px 0;
        }
        .staff-member {
            background: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 45%;
            margin: 20px 0;
        }
        .staff-member img {
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .staff-member h3 {
            margin: 0;
        }
        .staff-member p {
            color: #777;
        }
        .social-media {
            margin-top: 10px;
        }
        .social-media a {
            text-decoration: none;
            color: #333;
            margin: 0 10px;
            transition: color 0.3s;
        }
        .social-media a:hover {
            color: #575757;
        }
        @media (max-width: 768px) {
            .staff-member {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="about-header">
            <h1>About Us</h1>
            <p>All about us</p>
        </div>
        <div class="staff">
            <div class="staff-member">
                <img src="image/profil.jpg" alt="Irfan Mahardhika" width="150">
                <h3>Irfan Mahardhika</h3>
                <p>I</p>
                <ul>
                    <li>Handball Grand Master</li>
                    <li>Speed Knitting</li>
                    <li>Cup Stacking</li>
                </ul>
                <div class="social-media">
                    <a href="https://facebook.com/irfan" target="_blank">Facebook</a>
                    <a href="https://twitter.com/irfan" target="_blank">X</a>
                    <a href="https://instagram.com/irfan" target="_blank">Instagram</a>
                </div>
            </div>
            <div class="staff-member">
                <img src="image/profil.jpg" alt="Fadhil Ayman Hanif" width="150">
                <h3>Fadhil Ayman Hanif</h3>
                <p>II</p>
                <ul>
                    <li>Angkatan 16</li>
                    <li>Fluent in 4 Languages</li>
                    <li>Auction Stenographer</li>
                </ul>
                <div class="social-media">
                    <a href="https://facebook.com/fadhil" target="_blank">Facebook</a>
                    <a href="https://twitter.com/fadhil" target="_blank">X</a>
                    <a href="https://instagram.com/fadhil" target="_blank">Instagram</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
