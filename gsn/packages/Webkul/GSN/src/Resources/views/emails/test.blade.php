<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ordre des Experts-Comptables</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-color: #2a354f;
      --text-color: #ffffff;
      --card-bg: #2a354f;
      --card-text: #ffffff;
      --border-color: #e5e7eb;
      --link-color: #3b82f6;
      --font-family: 'Inter', sans-serif;
    }

    body {
      font-family: var(--font-family);
      background-color: var(--bg-color);
      color: var(--text-color);
      padding: 2rem;
      margin: 0;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      width: 50px;
      height: 50px;
      margin-right: 1rem;
      object-fit: contain;
      filter: sepia(0.3) hue-rotate(-60deg) saturate(0.5) opacity(0.8);
    }

    .logo h1 {
      font-size: 1.5rem;
      font-weight: bold;
    }

    .date {
      font-size: 1rem;
      color: rgba(255, 255, 255, 0.6);
    }

    .content {
      background-color: white;
      color: darkslategray;
      border-radius: 0.5rem;
      padding: 2rem;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    h2 {
      font-size: 1.75rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }

    p {
      font-size: 1.125rem;
      line-height: 1.6;
      margin-bottom: 1.5rem;
    }

    .cta {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background-color: var(--bg-color);
      color: #ffffff;
      border-radius: 0.375rem;
      padding: 0.75rem 1.25rem;
      font-size: 1rem;
      font-weight: 600;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }


    footer {
      margin-top: 2rem;
      font-size: 1rem;
      color: rgba(255, 255, 255, 0.6);
    }

    footer a {
      color: var(--link-color);
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <div class="logo">
        <img src="https://cnoec-gsm.neway-esoft.com/themes/shop/default/build/assets/logo-942157c2.svg" style="width: 100%" alt="Ordre des Experts-Comptables">
       </div>
      <div class="date">Monday, September 9, 2024</div>
    </header>

    <div class="content">
      <h2>Hello there</h2>
      <p>We're excited to share with you our latest products and services that can help take your business to the next level. Our team has been working tirelessly to develop innovative solutions that address the unique challenges you face.</p>
      <p>From our cutting-edge software to our personalized consulting services, we're confident that we can provide the tools and expertise you need to succeed. We'd love the opportunity to discuss how we can collaborate and help you achieve your goals.</p>
      <a href="#" class="cta"  >Test Button</a>
    </div>

    <footer>
      <p>If you'd like more information,  .</p>
      <p>Best regards,<br>CNOEC GUIDE METIER.</p>
    </footer>
  </div>
</body>
</html>
