---
layout: single
title:  "Castle Wars Update 2.1 - Adding a Settings System to My Game Using Databox"
collection: castle-wars
permalink: /castle-wars/sprint2/1/
sidebar:
  nav: "castle-wars-nav"
---

_By Frank "Weekie" Podraza, Nov. 4, 2022_

<iframe width="560" height="315" src="https://www.youtube.com/embed/JEB6emgWHdk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
---

I wanted to add settings and a settings menu to my game to enable accessibility settings for those who need it, including myself. I chose to use Unity Asset: Databox. Databox is a modular data storage solution. I got it in a humble bunder a while back, so this is also a way to alleviate some buyer's remorse.

Really quickly, this is the new main menu. I whipped it up because I got really tired of looking at the default Unity skybox. The player devices panel has been moved to the top left. 

[PUT THE NEW MAIN MENU image here]

Back to settings. I wrote a short list of which settings I wanted to add into the game. This list includes:
- Field of View settings
- Toggle Sprint (for each Keyboard/Mouse and Controller)
- Toggle Crouch (for each Keyboard/Mouse and Controller)
- Horizontal look sensitivity (for each Keyboard/Mouse and Controller)
- Vertical look sensitivity (for each Keyboard/Mouse and Controller)
- General FOV effects toggle
- Sprint FOV effect toggle (off if general toggle is off)
- Lunge FOV effect toggle (off if general toggle is off)
- Dash FOV effect toggle (off if general toggle is off)

How do we put these settings into the game? We'll need to have
1. A way to store these values
2. A way to edit these values
3. A way to read these values, and apply them to game logic

Databox provides a way for us to store, edit, and read values. A Databox object is subdivided into Tables, Entries, and Values. A table is a collection of Entries, an entry is a collection of values, and a value is a typed, stored key-value pair.

[Show databox setup graphic]

I setup a table for all of the settings, so that the settings object can be exported. Then I made entries for 'Accessibility' and 'Controls.' The Field of View setting and effect toggles are values in the 'Accessibility' entry, and the toggle control settings and the sensitivity settings are under the 'controls' entry.

Now we have a way of storing these values, how do we edit them? There's 3 places in the game where they will need to be editable from:
1. The main settings menu
2. The secondary settings menu (for local split-screen players)
3. The pause menu

I whipped up a settings menu in the main menu, which would edit Player1's settings. I had to implement 2 new controller support UI elements

1. The toggle, which when pressing the affirmative button toggles the state of a variable.

[SHOW THE TOGGLE UI ELEMENT]

2. The value-selector, which when you click the affirmative button, hijacks the left and right navigation controls to edit a value by a certain amount, until you navigate up or down, or but the back button.

[SHOW THE VALUE SELECT UI ELEMENT]

Now we can edit the values, but an unseen problem has arisen. The whole menu does not fit on one screen. This really isn't that big of an issue, but I need to have some way of scrolling with the controller. Each node in the UI now has a value for the vertical position of the scroll view which gets set when the node gets highlighted. If you've ever scrolled the Nintendo 3ds home menu this will feel exactly like that.

[PAUSE MENU SCROLLING GIF]

Speaking of unseen problems, what happens when we have 2 players that say, want to have different FOVs? There'd be a data collision. We're going to need to have a separate Databox objects for each local player. I created a settings object manager which stores a default, as well as 4 objects which can be edited, and correspond to a local player. Because we can export/import these settings, eventually they will be attached to an account, but for now I don't want to deal with that.

Later down the line I'll likely want to modularly generate the settings menu on load, that way I can add more settings, and I don't have to update 3 menus individually. 

With everything now set up, I was able to implement the settings by pulling their values on the player character component and the camera effects component for the controls settings and the accessibility settings respectively. 

[SHOW THE FOV VALUE SELECT WORKING IN A GIF]


