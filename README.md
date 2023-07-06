# InternFinder

## About InternFinder
It is a website that aims to publish training advertisements for companies and to register for training for those wishing to join the training they want. It also enables users to create their own CV consisting of personal information, information about the educational and professional path, the experiences gained, and even the languages of communication.

## Screenshots
### Header Section  
<img src="https://github.com/MedjadjiAbdelkadir/InternFinderV1/blob/main/public/Screenshots/HeaderSection.png" width="100%" height="500">

### Choose Register Page (Trainee or Entrepreneur)
<img src="https://github.com/MedjadjiAbdelkadir/InternFinderV1/blob/main/public/Screenshots/ChooseRegisterPage.png" width="100%" height="500">


### Login Page
<img src="https://github.com/MedjadjiAbdelkadir/InternFinderV1/blob/main/public/Screenshots/LoginPage.png" width="100%" height="500">

### Top Companies  
<img src="https://github.com/MedjadjiAbdelkadir/InternFinderV1/blob/main/public/Screenshots/TopCompanies.png" width="100%" height="500"> 

### Last Formations 
<img src="https://github.com/MedjadjiAbdelkadir/InternFinderV1/blob/main/public/Screenshots/lastFormations.png" width="100%" height="500"> 

<!-- ### Logout -->
<!-- <img src="https://github.com/MedjadjiAbdelkadir/covoiturage/blob/main/public/Screenshots/Result%20Serach.png" width="55%" height="500"> -->

## Technologies Used in the Project 

- [Laravel](https://laravel.com).
- [database MySQL](https://www.mysql.com)


## Project Structure 
├─ `app` \
├─ `bootstrap` \
├─ `config` \
├─ `database` \
├─ `public` \
├─ `resources` \
├─ `routs` \
├─ `storage` \
├─ `tests` \
├─ `vendor` \
├─ `.env.example` \
├─ `artisan` \
├─ `composer.json` \
├─ `package.json` \
├─ `README.md`

## Requirement
- [php version 7.3.0](https://www.php.net)
- [composer](https://getcomposer.org)

## How To Use

### Download Repository

```bash
# Clone this repository
$ git clone https://github.com/MedjadjiAbdelkadir/InternFinderV1.git
# Go to the project directory
$ cd InternFinderV1
# Create file .env
$ cp .env.example .env.
# Generate Key Of .env
$ php artisan key:generate.
```

### Create DataBase && Migration && Seeding
```bash
# Create DataBase
$ CREATE DATABASE IF NOT EXISTS 'InternFinder'
# Go to file .env
DB_DATABASE=InternFinder
# Migration Table
$ php artisan migrate
# Seeding table
$ php artisan db:seed
```

### Run Project

```bash
# Run the project
$ php artisan serve
```