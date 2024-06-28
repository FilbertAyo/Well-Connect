<!DOCTYPE html>
<html>
<head>
    <title>WeLL CoNNECT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2b4260;
        }
        p {
            color: #666666;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #eeeeee;
            margin: 5px 0;
            padding: 10px;
            border-radius: 4px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #2b4260;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome {{ $name }} to Well Connect!</h1>
        <p>You have successfully registered to our app</p>
        <ul>
            <li>Name: {{ $name }}</li>
            <li>Email: {{ $email }}</li>
        </ul>

        <p>Thank you for choosing our App!</p>
    </div>
</body>
</html>
