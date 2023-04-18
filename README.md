# JSG Absences

www.google.com

## Description
### Concept – What is this Website for?
This website was created out of the need for a better solution for counting the absences of members in rehearsals; Previously, everything was done by hand on a sheet of paper and that needs to change.
The concept is, that one or more members of the JSG can easily document, which members of the JSG were present in a rehearsal, and who not. This is primarily needed for the general assembly for distributing prizes, depending on who participated in the most rehearsals. If needed, more “services” could be added.

### Structure
The website contains a start page with a login prompt, where the user needs to login to change or document everything.
After login, the user is directed to a dashboard with 4 options: Create new User for adding a new JSG-member, Document todays absences, Todays submitted absences and Absences for a Time Period (User can choose over which time).

## How to install and run the project
Since the code here is used on a website, refer to the link given in the description above.

1. To run it locally, you'll need to download, install and start XAMPP:
2. Download the Files and Paste them into the htdocs-file inside of XAMPP.
3. Since the project uses a database, you'll need to import it into PHPMyAdmin.
4. After that, the website should start and function properly when opened. (May need to add login first)

## Structure and other explanations

### General
I'll not describe every single file and what it does, but only a short summary; For more information, please read the code.

First, the user gets prompet with a login: A PHP-script checks it and if the login was correct, the user is forwarded to the Homepage.
From there, he has multiple options: New Member, Register Absences and Show Absences (Timespan or all). These scripts work by sending a form via HTML and PHP to the Databse, which then GIUDs the Data and displays it in a PHP file, which then is read, interpreted and displayed by javascripts.

Generally, every PHP file/procedure has its own login, which is strictly restricted to only the fields needed. Not more and not less.
These logins are gotten from config.php files, separate from the other scripts.

### Folders
The organisation of the file system is quite simple: Each file type has its own folder: PHP, HTML etc. The only files outside of folders are the Staging.html and the index.html.

### Database
TBA

### Challenges
TBA

## How to?
Here are some things that are quite important for the overall Structure, including Versioning and Branching;

### Versions
Since this is my first program, I searched the internet and came up with the following sceme:
vX.Y.Z_a

X:
- X is used for major releases, that change something fundamental, that might not be backwards compatible.

Y:
- Y is used for minor releases and new features.

Z:
- Z is used for Bugfixes, Hotfix, Patches and alike

a:
- a is used for indicating a change in the documentation which didn’t modify anything other than the documentation; For example when modifying the wording in the documentation or adding a paragraph.

#### Increments:
Each number is incremented normally and can only be reset, if the previous digit is modified  (1.0.5 => 1.1.0 instead of 1.1.5).
The same applies to the documentation indicator – But it resets after each patch (1.1.0b => 1.1.1_a instead of 1.1.1_c)
Preferably, a Document with all Versions ever and descriptions each needs to be created for better oversight over all changes.

#### In Use
The Versions Table inside the documentation here contains every version (minor, patch) of the current major release and the major releases from before: **BUT** every version must be added to the versions document, with a details of the change.

f.ex:

`v.0.0.0 - Initial Development`

`v.1.0.0 - Release 1`

`v.1.0.1 - Bugfix Login`

`v.1.0.1a - Spelling Error`

### Branches
I don't know that much about this part of programming, so I'll just use, what I learned from some googling:
The current approach is, that 2 "big" branches exist: the Master/Main (Production) branch and the development branch.

If a new feature is added, it needs to be based on the development branch and be a seperate branch for each iteration or feature. When finished, it is first merged into the development-branch and then from there into the main branch. 

Each branch is named using the pattern used for versioning and a short keyword about what the new thing/branch is supposed to do/be for;
`v0.0.1/Bugfix_login`

## FAQ
TBA

## Known Issues
These are known Issues by the developers, that will be fixed in the near future:

- Login Security
- DB Table

## General Improvements to be made
Here are things that could, should, may or need to be changed:

### General
-	**Remove any remains of Norwegian words and alike (Mainly filenames)**
-	~~Translation? (Done)~~
-	Easter Eggs (for fun)
-	**Provider**
-	Revise Documentations ==> Diagram of Program
-	~~Change Wording for Absence (Done)~~
### Database
-	New field in Login (isAdmin) for admin functions?
-	Make “Name” field in «abwesenheiten_daten» a foreign key referencing “mitglieder” table 
-	~~Change Login in PHP-files (Done)~~
-	~~submitToDB.php => get Members via SQL and not file. (Done)~~
-	~~Checking if already exists (Done)~~
### Functions and features
-	Delete User (admin)
-	Add User (admin)
-	Edit Absence
-	Optimize View of Absences
  - Table on website itself?
### Behind the Scenes
-	Editing History for verification 
  - Date, Login, what type (“2023-03-07; Wernle_y; Created new User”)
-	Improve Login
-	Improve Security
-	Backup for the data
-	~~“Currently being changed” – Staging thingy (Done)~~
-	Document documenting all Versions
-	
### ToDo before next major release
-	Revise Documentation
-	Document all Versions in Separate Document
-	Provider
-	Monolingual (Partially)


## Versions

| Date       | Version       | Author                  | Description       |
| ---------- | ------------- | ----------------------- | ----------------- |
| 07.03.2023 | `v. 0.0.0` | Wernle Yannick | Initial Development |
| 13.04.2023 | `v. 0.0.0a` | Wernle Yannick | Small Modifications, such as Versions|
| 18.04.2023 | `v. 0.0.0b` | Wernle Yannick | Rewrote Documentation in README and scrapped old version |
| 18.04.2023 | `v. 0.0.1` | Wernle Yannick | Fixed Language, Code Smells, Structure, Removed "Mitglieder.txt" from being used in Code & Added Version Document |
| 20.04.2023 | `v. 0.1.0` | Wernle Yannick | Added "Delete Member", "Update Member", made "New Member" seperate, added "New Login", "Edit Login", "Delete Login" |

## Contact & Credits

### Contact

#### Development:
Yannick Wernle,

Remigerstrasse 31, 5234 Villigen

yannick@wernle.net

+41 077 464 47 80

#### Management Board:
Current members:
Vorstand – Jugendspiel Geissberg (jsgeissberg.ch)

Contact:
Kontakt – Jugendspiel Geissberg (jsgeissberg.ch)

### Credits
©Yannick Wernle & Jugendspiel Geissberg

