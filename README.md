## Introduction

Gambling.com Dev Code Test that lists affiliate that lives within 100km of the Dublin office


## Setup
- Pull this repo
- Run composer install
- Run php artisan serve
- See [Endpoints](#endpoints)

## Routes

There are 3 Routes

| Route Name  | Endpoint | Type | Details  |
| ------------- | ------------- | ------------- |------------- |
| [Form Page](#form-page)  | /  | GET | Unprotected |
| [Results Page](#results-page)  | /results   | POST | Unprotected |
| [Get Selected Affiliates](#get-selected-affiliates)  | /api/get-selected-affiliates   | GET | Unprotected |

### Form Page

This page contains a file input field. 

Click the input field

Select the file

Click Upload

The Results page will be displayed

### Results Page

This page shows a table containing the list of Affiliates within 100km to the office 


### Get Selected Affiliate

This is a get endpoint, it loads .txt file from inside the app and returns the selected affiliates in JSON




