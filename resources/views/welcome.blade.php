<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FUL E-Library</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('css/chat.min.css') }}">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: 'Nunito', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .header {
            background: #0073e6;
            color: white;
            text-align: center;
            padding: 100px 20px;
        }

        .header h1 {
            font-size: 50px;
            margin: 0;
        }

        .header p {
            font-size: 24px;
        }



        .content {
            padding: 50px 20px;
            text-align: center;
        }

        .content h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
        }

        .features {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .feature-box {
            width: 30%;
            min-width: 250px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: transform 0.3s ease;
            margin-bottom: 20px;
        }

        .feature-box:hover {
            transform: translateY(-10px);
        }

        .feature-box h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .feature-box p {
            font-size: 16px;
        }

        .testimonials {
            background: #f0f0f0;
            padding: 50px 20px;
            text-align: center;
            margin-top: 50px;
        }

        .testimonials h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .testimonial-box {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .testimonial-box p {
            font-size: 18px;
            font-style: italic;
        }

        .testimonial-box .author {
            margin-top: 15px;
            font-weight: bold;
            font-size: 16px;
            color: #0073e6;
        }

        .cta {
            background: #0073e6;
            color: white;
            padding: 50px 20px;
            text-align: center;
            margin-top: 50px;
        }

        .cta h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .cta a {
            display: inline-block;
            padding: 15px 30px;
            background: #fff;
            color: #0073e6;
            font-size: 18px;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .cta a:hover {
            background: #e6e6e6;
        }

        .footer {
            background: #0073e6;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
        }

        .footer p {
            margin: 0;
        }

        .img_logo {
            padding: 150px 0;
        }
    </style>
</head>

<body>

    <div class="header animate__animated animate__fadeIn">
        <img class="img_logo" src="https://www.fulokoja.edu.ng/assets/media/images/ful-logo_1694711452.png" />
        <h1>Welcome to FUL E-Library</h1>
        <p>Your Gateway to Knowledge and Learning</p>
    </div>

    <div class="content">
        <h2>Explore Our Resources</h2>
        <p>Find a vast collection of books, research papers, and digital resources tailored to your academic needs.
            Whether you're preparing for an exam, working on a research project, or simply exploring a new topic, FUL
            E-Library has something for you.</p>

        <div class="features">
            <div class="feature-box animate__animated animate__zoomIn animate__delay-1s">
                <h3>Search Books</h3>
                <p>Access thousands of books from various disciplines right at your fingertips.</p>
            </div>
            <div class="feature-box animate__animated animate__zoomIn animate__delay-2s">
                <h3>Digital Resources</h3>
                <p>Explore our digital resources, including research papers, journals, and more.</p>
            </div>
            <div class="feature-box animate__animated animate__zoomIn animate__delay-3s">
                <h3>Chat with Us</h3>
                <p>Need help? Chat with our AI-powered chatbot to get answers to your queries.</p>
            </div>
            <div class="feature-box animate__animated animate__zoomIn animate__delay-4s">
                <h3>Study Spaces</h3>
                <p>Reserve study rooms and spaces to focus on your academic work without interruptions.</p>
            </div>
            <div class="feature-box animate__animated animate__zoomIn animate__delay-5s">
                <h3>Online Tutorials</h3>
                <p>Join our online tutorials and workshops to enhance your skills and knowledge.</p>
            </div>
        </div>
    </div>

    <div class="testimonials">
        <h2>What Our Users Say</h2>
        <div class="testimonial-box">
            <p>"FUL E-Library has been an incredible resource throughout my studies. The vast collection of books and
                digital resources has helped me excel in my courses. The chatbot is also super helpful!"</p>
            <div class="author">- Aina Oluwapelumi, Computer Science Student</div>
        </div>
        <div class="testimonial-box">
            <p>"The study spaces and online tutorials have been a game changer for me. I love how easy it is to find
                exactly what I need for my research projects."</p>
            <div class="author">- Mary Oyiza Bello, Engineering Student</div>
        </div>
    </div>

    <div class="cta">
        <h2>Ready to Dive In?</h2>
        <a href="#">Start Exploring the Library</a>
    </div>

    <div class="footer">
        <p>&copy; 2024 FUL E-Library. All rights reserved.</p>
    </div>

    <!-- Chatbot Script -->
    <script>
        var botmanWidget = {
            aboutText: 'Start the conversation with Hi',
            introMessage: "Welcome to FUL E-Library Chat bot"
        };
    </script>
    <script src="{{ asset('js/widget.js') }}"></script>

</body>

</html>
