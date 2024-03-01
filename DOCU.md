## Table of Contents
- [Intro](#intro)
- [Communication channels / Contract](#communication)
- [Design and Structure](#design)
- [Sprints / Daily notes](#sprints)

---

## Intro

Group 6 members: Denize, Denjin, Elias, Jacob, Sebah. We started the project by signing our contract, laying out the group members' responsibilities, requirements, and expectations. We discussed our end goal and established a daily schedule and timeline. In this document, we will share links related to documentation, design, and communication channels during the project.

We started the project by signing our contract. Which helped us lay the group members responsiblites, requirements and expectations. We discussed our goal at the end of the project and even set a daily schedule and timeplan. 
I this document we will be sharing the links related to documentation, design and communication channels during the project.

---

## Communication channels / Contract

- We have used discord as our main communication channel. We had a group were we shared tips, instructions, daily updates and github activities.

![Discord Channel](./images/discord.png)

- Moreovere as stated above have we as well sat down and wrote our contract and signed as a group. 
[Contract Doc](https://docs.google.com/document/d/10IKQ9a1NHhIJJUe-Iqpym66g51a21CqkoGxUt3mVdbI/edit?usp=sharing)

---

## Design and Structure
- For our database structure and understanding, we used the Figma Projects [Fig Jam](https://www.figma.com/file/Mmx2g9kQwmqjFEJUEEelXI/U05_IMDb_Klon-ERD_Sitemap?type=whiteboard&t=apxBFbQt0IeUN6Tw-1) to visualize our ERD and Sitemaps. Moreover the have we used [Lucid Charts](https://www.lucidchart.com/) for our ERD.

- As for our low and high prototypes have we used [Figma](https://www.figma.com/file/F5yEJOMn965gSscTSkxvey/U05_IMDb_Klon?type=design&node-id=0-1&mode=design&t=wuGw36Fn0aLGh8Gt-0)

---

## Sprints / Daily notes

**Disclaimer:** The text below is summarized with the help of AI. For the full document written by Denize, Denjin, and Sebah, visit: [Google Doc/ Documentation](https://docs.google.com/document/d/1vUwvxp8LxeG6yFwYXpTV6CwTirsXCk5sahLya3pFvX8/edit?usp=sharing).
 
We decided on four main sprints where we discuss the content for the upcoming sprint by the end of the preceding one. We have meet almost daily, so we had regular sprint checkups.
1. Planing, Structure and DB setup.
2. DB setup, Design , Backend.
3. Backend and Deployment setup.
4. Backend and Tailwind.

**Friday 02/02/24:**
- All present.
- Agenda: Contract signing, deciding on agile method, structuring work, discussing GitFlow, determining code standards, starting the project.
- Elias tasked with Tailwind documentation review over the weekend.
- Planned Monday meeting at 09:00 in school for GitHub flow overview and setting up devcontainer.

**Monday 05/02/23:**
- All present.
- Created dev-container with Laravel and database.
- Discussed blades, templates, ER-diagram, and site.map planning.
- Started working on Git issues, sitemaps, SQL tables, and ERD.

**Tuesday 6/2/2025:**
- Elias, Jacob, Sebah, and Denize present.
- Meeting with Olli-Heikki regarding database syncing and ERD.
- Agreed on work structure, documentation strategy, landing page structure, and design.
- Tasks distributed, including lo-fi and hi-fi prototypes.

**Thursday 8/2/2024:**
- All present except Denjin.
- Structured ER diagram, planned landing pages, and discussed database initialization.
- Summary of the week's work for Olli-Heikki.
- Started creating SQL tables, ERD, and sitemaps.

**Friday 9/2/2024:**
- Present: Denjin, Sebah, Denize, Jacob; Elias absent.
- Meeting with Olli-Heikki to review sitemap and ERD.
- Discussed database sync and effective approaches.
- Planned next steps and reading Laravel documentation.

**Monday 12/2/2024:**
- All present.
- Reviewed current status and next steps.
- Distributed tasks, including completing ER-diagram and creating tables.
- Started working on migrations and seeders.

**Tuesday 13/2/2024:**
- All present.
- Continued creating tables, migrations, and seeders.
- Started applying breeze and planning MVC structure.

**Thursday 15/02:**
- All present.
- Connected database to Aiven and worked on Vercel deployment.
- Met Olli-Heikki, discussed deployment, and planned controllers.

**Friday 16/2:**
- Present: Denjin, Jacob, Denize, Sebah; Elias absent.
- Fixed githooks, created pivot table migrations, and worked on models.
- Reviewed the week's progress and planned for the next sprint.

**Monday 19/2:**
- Present: Denjin, Jacob, Sebah, Elias; Denize absent.
- Focused on models and MVC structure.
- Prepared questions for meeting with Olli-Heikki.

**Tuesday 20/2:**
- All present.
- Continued working on models, controllers, and user authentication.

**Wednesday 21/2:**
- All present.
- Continued work on user authentication, data addition, Figma, and controllers.
- Some small issues we had we asked Olli-Heikki about this and he gave us some advice how to solve this.

**Thursday 22/2:**
- All present.
- The work continued with more specification in our Models and Controllers where we tested our different Controllers and the connection. If there is some issues with the connection, and trying to dive into the details of the issues.

**Friday 23/2:**
- All present
- Today we put together what everybody has done this week and later on we tried to see on our vercel App what we have done. What has worked and what errors we got. Then we hade a short meeting on what we are going to focus on next week, and what problems/errors we have that has to be fixed before the presentation.

**Monday 26/2:**
- All present
- Today we hade our weekly sprint, where we talked about the upcoming tasks, what we have left, how much work that's been done. Then we planned the day and the issues we faced in the order of the importance and what we have to prioritize first. The things that was most crucial to be done before thursdays presentation. 
- We tested so everything was updated in the deployment App when we pushed our changes. We also checked the Users login, and that the functions worked, we still have some small issues left. We also started with the functions for the Admin.

**Tuesday 27/2:**
- All present
- Today we put Tailwind styling on the blade-files so we would have styling in all the pages we have in our project.
- Also we had some problems with some of our tables so we re-named some of the tables and tried some different functions so it would connect correctly in the database.
- We added some more functions into the User and did some adjustments into the styling so all the pages have the same correct styling. We also did some corrections in the Movies.blade-file.

**Wednesday 28/2:**
- All present
- Today we worked a lot with the UserDashbord and also with the modify-files so it could have the right routing, so it would connect successfully. We also added some functions in their blade-files. We also fixed the UserController so the users would appear on the modify route. 
- We also added a function on the welcome-blade so it would show the movies randomized.
- We added a route for the movies in the welcome.blade-file.
- We added a destroy function in the UserController and we fixed the Directors store function in the Modify.blade-file and the destroy function in the Cast.blade-file so it would work properly.
- We went through the final changes in the styling and what is left.

**Thursday 29/2:**
- All present
- We had a meeting early in the morning to see what's left and we also did a presentation of our project for our teacher Sebastian and our class
- We got some feedback from Sebastian that we worked on this day after the presentation, and we will have to work on this tomorrow too, to make the final changes,and the final things we need to add to our project.
- We added some authorization functions for the Admin so the Admin has the possibility to remove users and also we put a function so the Admin can add a movie to our website.
- We also worked on the destroy function and the store function in the WatchlistController so it could work properly and will continue with this tomorrow.

**Friday 1/3:**
- All present
- We continued working on the things Sebastian told us yesterday so we could have it done by today.
- We also continued working on the final issues in the WatchlistController so we could get it to work correctly.
- We did the last details we hade for our styling and the movie-cards we have on the welcome-page.


---
