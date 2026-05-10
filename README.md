# SocialNet Project

SocialNet is a simple social network mock web application for a university assignment.

## Tech Stack

- PHP
- MySQL
- Nginx
- Linux

## Database

- Database name: `socialnet`
- Table name: `account`
- Columns: `id`, `username`, `fullname`, `password`, `description`
- Default test account:
  - Username: `admin`
  - Password: `admin123`

## Features

- Create new user account
- Sign in and sign out with sessions
- Show user info on the home page
- List other users and open their profile pages
- Edit profile description in Setting
- Show profile content in Profile
- Shared MenuBar on main pages

## Pages

The application implements these required routes:

- `/admin/newuser.php` - Create new user
- `/socialnet/signin.php` - Sign in
- `/socialnet/index.php` - Home page
- `/socialnet/setting.php` - Edit profile content
- `/socialnet/profile.php` - View profile content
- `/socialnet/about.php` - Student information page
- `/socialnet/signout.php` - Sign out

## Setup

1. Copy the repository into your web server root.
2. Import `socialnet-project/db.sql` into MySQL.
3. Update database credentials in `socialnet-project/includes/db.php` if needed.
4. Open the Sign In page in your browser.
5. Log in with the default test account above.

## Notes

- Home, Profile, Setting, and About pages require a signed-in session.
- The MenuBar is shared across the main pages.
- The project includes a custom dark UI.
