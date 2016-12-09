Scope
-------------------------------

1. Intro: “What are we going to make?


Cit. (Garett, p. 61): "On the scope plane, we start from the abstract question of “Why are we making this product?” that we dealt with in the strategy plane and build upon it with a new question: “What are we going to make?

2. "content offerings" and "software functions" and their mutual implications.

The primacy of the "content component" was stated earlier in the strategy and vision.

An implication comes from our (future) software functions and existing site as how to store content:


2.1. NONE requirements

The website is not a social communication or blogging platform for its memebers. 


2.2. "content offerings"

a.) the existing content from the old page will be tranferred and a new "welcome" page for our seondary audience will be implemented.

b.) the welcome-page should only have a simple form included to order a brouchure, to easily initiate contact to prospective members without asking too many personal details.


c.) the static quarterly calendar page will become a software function (with easy print and download as pdf feature).

d.) our special interest groups can easily create and maintain content on their own, when the new online editing function is in place.

e.) printed pages from the club room notice-board will become a new content offering. 

These are dynamic in nature (money raised for our yearly christmas charity by different events/special interes groups ; rankings from the tennis, bingo, and chess group).

The move from "static" to dynamic will be a future software function.



2.3. Persistence and document format: HTML/CSS and file System


The decision was made NOT to move towards a CMS but to keep working directly with the file system of the server and HTML. Another layer of technology is contrary to our "lean requirements" and gradual roll-out and continous improvement process.

Besides this, no easy to use CMS could be identified. GetSimple has the disadvantage of a proprietary xml-based document format ("lock in"). The same is true for DokuWiki, easy too use but too difficult to align  with future software functions.

A "real" and "neutral" document format which can be be tranformed to any format (xml-based and xslt/fo) would be a sound technologial solution but is also beyond our scope.


2.4. Software Functionality

As with the static content we wish for a technology which is broadly used. It should be "easy" to source developers. Therefore all software functions (own developments and customized external components) must use PHP or JavaScript on a LAMP/MAMP-stack.

2.5. List of software functions

This is a (preliminary) order subject to approval by the project committe.

1. Online editing of static content for our editors without the extra layer of a CMS.

2. Up-to date List of the "book exchange"

3. Online ordering of our cafe's menues for home delivery.

4. A list of all our events with filtering options and sign-up for logged in members.

In the future this dynamic calendar will also link to static content (e.g. "see details of old travel reports to this destination").

Logged in members will see "their" events and can export a calendar-link to mobile/desktop calendar applications.

2.6. Error messages

Every error message must be understandable to a user. If an error is caused by a user the error message must provides alternative ways if there are any.


2.7. Technical requirements (Garett, p. 65)

Client side hardware:

We do not want to exclude any vendor supported browser version from the full access to the websites offering.

For a desktop we assume a minimum with of 1024px, this means that the VGA screen of persona "Frank" does not impose a restriction to our website.

However, we assume that many members have old or new slow running computers. Therefore client-side processing of JS and CSS visual effects should be kept to a neccessary minimum.

In all our user scsenarios we do not consider users switching off JavaScript. However, the absence of JavaScript in a browser must not limit the access to any information.

Client side devices:

We expect many users to have a mobile device as the sole means to internet access. Essential content and functionality must be accessible for these devices.



















