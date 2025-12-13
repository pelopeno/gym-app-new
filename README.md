# Gym App (Laravel)

A web-based fitness and wellness management system built with Laravel.  
It allows administrators to manage gym announcements and categories, while users can submit and view reviews with optional images.

---

## Overview

The Gym App provides a structured platform for managing gym-related content and user interactions.  
It includes separate modules for user reviews, announcement management, and administrative moderation.

---

## Features

### User Features
- Secure registration and login system  
- View and filter announcements by category  
- Submit reviews with optional images  
- View approved reviews with pagination  

### Admin Features
- Create, edit, delete, and restore announcements  
- Upload and manage announcement images (auto-resized using Intervention Image)  
- Manage announcement categories  
- Approve or reject user reviews  
- Log all admin actions through a custom `LogsActivity` trait  

---

## Technology Stack

| Layer | Technology |
|-------|-------------|
| Backend | Laravel 10 (PHP 8.2) |
| Frontend | Blade, Tailwind CSS |
| Database | MySQL |
| Image Processing | Intervention Image |
| Authentication | Laravel Jetstream / Breeze |
| Logging | Custom LogsActivity Trait |
| File Storage | Public directories for images |
