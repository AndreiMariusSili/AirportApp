# Airport App

## Description

This application can be used to keep track of departures and arrivals at an airport, as well as schedule new ones. It consists of two parts. The first is a laravel API that handles database interactions in the form of get and post requests from the web interface. The front-end is built as a single-page web app using Angular and Materialize.css, which interacts with the api through ajax requests.

The application allows viewing collections of flights, as well as more detailed information about each flight, including schedule, history and attached controllers.
It also alows the user to schedule a new flight. A side-note here, to allow for testing, the user is actually allowed to schedule flights back in time. This has been done to enable testing the comparison logic between a flight's history and it's schedule.

## Project Setup

First of all, you need to: 
* clone the repo to an empty folder
* **cd** into the root folder of the project

Next, install the project's dependecies. In order to do so, from the root, run:
* **composer install** to add back-end dependencies
* **npm install** to add front-end dependencies
* **gulp** to copy necessary assets to the public folder

Finally, you need to set up a dev environment. The project ships with a vagrantfile, configured for virtualbox. Assuming the VirtualBox and Vagrant are installed on the host machine, the stept necessary to set up the dev environment are:

* run **php vendor/bin/homestead make** from the project root, which will create the config files for the VM
* run **vagrant up** from the terminal, which will create a VM dedicated to this project
* edit the *hosts* file to resolve the local ip **192.168.10.10** to **homestead.app**
* edit the *yaml* file to map the project root on the VM to the project root on the host machine

Finally, it is required to run the database migrations. Also, a database  seeder is provided in order to jump-start testing. Run the following commands from the root:
* create database schema: **php artisan migrate** 
* seed the database **php artisan db:seed**

##Database

The database consists of several tables which contain "master data". These are:
* users : information about the admin user
* airport : information about the airport
* flights : general information about each flight that arrives or departs from the airport
* flight_days : information about the days in which every flight is set to take off or land
* controllers : information about the controllers employed at the airport

Lastly, the schedules table pulls information from the flights, flight_days, and controllers to create a schedule for each flight with precise dates and times at which the flight wil depart/arrive. Each schedule has attached to it one or more controllers.

## Further considerations
The application is intended as a proof of concept,thus some features remain unimplemented. Among those, the most obvious drawbacks are:

1. there is not back-end validation for the post request
    * all the data that the user is allowed to input through the web interface takes into account the necessary contraints:
        - a flight can be scheduled only on the days in which it is supposed to fly
        - the same lane and controller cannot be assigned on two flights which arrive/depart at less than an hour difference
    * however, this can be easily modified by a malicious user by modifiyng HTML markup.
2. seeder does not schedule flights, but only creates flight master data
    * this means that schedules need to be manually added through the web interface for testing.
    * most of the logic is there, but time constraints did not allow me to build the seeder for the schedule and controller models.
3. lack of scalability
    * as the application potentially grows, manually scheduling flights will require too much resources.
    * this could be fixed by setting a scheduled task to create the flight schedule a month in advance , leaving the user to handle only update operations on the schedules

## Final Note

Never though I would say this, but Angular is pretty cool. You can do some amazing things using this framework, with relatively little effort once you get the hang of it. I have had both fun and frustrating times developing this POC. Overall, I am grateful I took the challenge and quite content with the outcome. Hope you guys will like it as well. :)