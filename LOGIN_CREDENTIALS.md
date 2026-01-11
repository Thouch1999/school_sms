# Login Credentials for Testing

## Fake Authentication System

This application uses a fake authentication system for development and testing purposes.

### Available Accounts

#### Master Admin
- **Email**: `admin@school.edu`
- **Password**: `admin123`
- **Role**: Master Admin
- **Access**: Full system access

#### Teacher
- **Email**: `teacher@school.edu`
- **Password**: `teacher123`
- **Role**: Teacher
- **Access**: Limited access

## How to Login

1. Navigate to `/login`
2. Enter one of the email addresses above
3. Enter the corresponding password
4. Click "Sign In to Dashboard" or "ចូលទៅកាន់ផ្ទាំងគ្រប់គ្រង" (Khmer)
5. You will be redirected to the dashboard

## Features

- ✅ Session-based authentication
- ✅ Remember me functionality
- ✅ Multilingual support (EN/KH)
- ✅ Error handling for invalid credentials
- ✅ Logout functionality

## Logout

To logout, you can create a logout button that sends a POST request to `/logout` route.

## Notes

⚠️ **Important**: This is a fake authentication system for development only. 
Do not use this in production! Replace with proper Laravel authentication (Laravel Breeze, Jetstream, or custom implementation).
