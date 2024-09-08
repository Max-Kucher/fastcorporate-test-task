Simple web project with track user activity.

Structure:
- login
- logout
- registration
- page A with the button “Buy a cow“ (after clicking, it is disappeared and shows message 'thankYou' instead)
- page B with the button “Download“ (after clicking button, starting download any exe-file)
- page with Statistics of users' activity
- page with reports

Roles:
- user (authentication, view pages)
- admin (user rights + view page with stat)

Page with stat - table of events with filters:
- date
- user
- actions (login, logout, registration, view-page, button-click)

Page with reports:
 - graph: x: dates, y: count of
   1) page view A
   2) page view B
   3) click “Buy a cow“
   4) click "Download"
 - table with columns
   1) date
   2) count page view A
   3) count page view B
   4) count click “Buy a cow“
   5) count click "Download"
