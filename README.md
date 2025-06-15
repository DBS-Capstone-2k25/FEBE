# Bedah Sampah - AI-Powered Waste Management Platform

<div align="center">
  <svg width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
    <circle cx="100" cy="100" r="90" fill="#4CAF50" opacity="0.2"/>
    <path d="M65,135 L135,135 L150,80 L50,80 L65,135 Z M85,75 L115,75 L110,65 L90,65 L85,75" fill="#4CAF50"/>
    <circle cx="75" cy="145" r="8" fill="#4CAF50"/>
    <circle cx="125" cy="145" r="8" fill="#4CAF50"/>
    <path d="M95,95 L105,95 L105,120 L95,120 L95,95 Z M90,105 L110,105" stroke="#FFFFFF" stroke-width="2" fill="none"/>
  </svg>
  <h3>Smart Waste Management for a Better Future</h3>
</div>

## 🌟 Overview

Bedah Sampah is an innovative web application that combines artificial intelligence with waste management education and scheduling. Our platform helps communities better understand and manage their waste through AI-powered tools, educational resources, and practical scheduling features.

## ✨ Features

### 🤖 AI Technologies
- **Image Classification**: Identify waste types from images
- **Object Detection**: Analyze waste objects in real-time
- **AI Assistant**: Get smart recommendations for waste management

### 📚 Educational Resources
- Comprehensive articles about waste management
- Practical guides for waste sorting
- Environmental impact awareness content

### 📅 Scheduling System
- Waste collection schedule management
- Waste bank program coordination
- Recycling program scheduling

## 🚀 Installation

### Prerequisites
- PHP 7.4 or higher
- Composer
- Node.js and npm
- Web server (Apache/Nginx)

### Step-by-Step Installation

1. Clone the repository
```bash
git clone https://github.com/yourusername/bedah-sampah.git
cd bedah-sampah
```

2. Install PHP dependencies
```bash
composer install
```

3. Set up environment file
```bash
cp env .env
```
Edit `.env` file with your database and other configuration settings

4. Set up database
```bash
php spark migrate
php spark db:seed
```

5. Start development server
```bash
php spark serve
```

Visit `http://localhost:8080` in your browser

## 🛠 Tech Stack

- **Backend**: CodeIgniter 4
- **Frontend**: Tailwind CSS, Flowbite
- **AI Models**: TensorFlow.js
- **Database**: MySQL

## 📱 Screenshots

<div align="center">
  <svg width="600" height="300" viewBox="0 0 600 300" xmlns="http://www.w3.org/2000/svg">
    <!-- Dashboard Preview -->
    <rect x="10" y="10" width="280" height="280" rx="10" fill="#f8f9fa" stroke="#dee2e6"/>
    <rect x="30" y="30" width="240" height="40" rx="5" fill="#4CAF50" opacity="0.2"/>
    <rect x="30" y="90" width="115" height="80" rx="5" fill="#4CAF50" opacity="0.1"/>
    <rect x="155" y="90" width="115" height="80" rx="5" fill="#4CAF50" opacity="0.1"/>
    <rect x="30" y="180" width="240" height="90" rx="5" fill="#4CAF50" opacity="0.1"/>
    
    <!-- Mobile Preview -->
    <rect x="310" y="10" width="280" height="280" rx="10" fill="#f8f9fa" stroke="#dee2e6"/>
    <rect x="330" y="30" width="240" height="60" rx="5" fill="#4CAF50" opacity="0.2"/>
    <rect x="330" y="100" width="240" height="40" rx="5" fill="#4CAF50" opacity="0.1"/>
    <rect x="330" y="150" width="240" height="40" rx="5" fill="#4CAF50" opacity="0.1"/>
    <rect x="330" y="200" width="240" height="40" rx="5" fill="#4CAF50" opacity="0.1"/>
  </svg>
</div>

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request. For major changes, please open an issue first to discuss what you would like to change.

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Team

- Frontend Developers
- Backend Developers
- UI/UX Designers
- AI/ML Engineers

## 📞 Contact

For any inquiries, please reach out to us at:
- Email: contact@bedahsampah.id
- Website: https://bedahsampah.id

---

<div align="center">
Made with ❤️ for a cleaner Indonesia
</div>
