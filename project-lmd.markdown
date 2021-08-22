---
layout: single
title: Launch My Dog Project
permalink: /projects/launch-my-dog/
sidebar:
  nav: "projects"
share: true

gallery:
  - url: /assets/images/launch-my-dog/SE Screenshot 1.png
    image_path: /assets/images/launch-my-dog/SE Screenshot 1.png
    alt: "LMD Game"
    title: "Launch My Dog in-game"
  - url: /assets/images/launch-my-dog/SE Screenshot 2.png
    image_path: /assets/images/launch-my-dog/SE Screenshot 2.png
    alt: "LMD Main Menu"
    title: "Launch My Dog main menu"
  - url: /assets/images/launch-my-dog/SE Screenshot 3.png
    image_path: /assets/images/launch-my-dog/SE Screenshot 3.png
    alt: "LMD Toppings"
    title: "Launch My Dog in-game level 19"
  - url: /assets/images/launch-my-dog/SE Screenshot 4.png
    image_path: /assets/images/launch-my-dog/SE Screenshot 4.png
    alt: "LMD Level 30"
    title: "Launch My Dog in-game level 30"
---

_By Frank "Weekie" Podraza_

This project is released and has an official landing page.

[**Check it out**](/launch-my-dog/){:target="_blank" .btn .btn--info .align-center}

![logo-right](/assets/images/LMD Icon.png){: .align-right height="30%" width="30%"}
Launch My Dog is a game where you launch a hot dog into a bun. I almost finished this game back in 2018, but felt that it wasn’t good enough to release. It didn’t feel fun. I came back to it early 2020 and have been slowly working on it since. The goal was a tight small game that I can release on Mobile. There’s some fun programming in here like trajectory prediction, even through different mediums. Launch My Dog was released on July 10th, 2021. It is available on both the iOS App Store and Google Play. Leaving a review is greatly appreciated, it boosts the game in search. I am currently working on extra levels and general quality of life improvements.

## Screenshot Gallery
``{% include gallery layout="half" %}``

## Development Process
![image-left](/assets/images/launch-my-dog/Feature Graphic.png){: .align-left height="45%" width="45%"}
I Had the idea for Launch My Dog in the middle of the night a few months after the release of Poke My Balls. The concept was simple: Launch a hot dog into a hot dog bun. I started working the very next day.

![old-image-right](/assets/images/launch-my-dog/comparison.PNG){: .align-right height="45%" width="45%"}
I worked on it for the next year, intermittently, building 108 levels, spanning 12 different level mechanics. A new mechanic was introduced every 9 levels. The 9 levels per mechanic figure came from how many buttons I could fit in a row. Starting a pattern that plagued this project's early days. That plague being the work-around, not being willing to put in the effort to fix the root problem, rather put on band-aid after band-aid until the game can barely stand.

![old-image-left](/assets/images/launch-my-dog/old LMD.PNG){: .align-left height="45%" width="45%"}
In summer of 2018 the project was complete. 108 levels that worked, a functioning shop with cosmetic items, and a half-baked level editor being planned for the near future. I planned on releasing the game. While play-testing, I noticed that the game just seemed to have lost its spark. It was not fun. It did not feel good to play. I felt like I needed to put the project down.

This feeling was made worse in August of 2018. My house lost power while my computer was on, and the project was open. When power returned I opened the project again to find out that it had been corrupted. While I had taken precautions, and backup up previously, this was the final straw. Having to re-do work in a game I wasn't having fun making or playing left me with one option. I left the project.

![image-right](/assets/images/launch-my-dog/SE Screenshot 1.png){: .align-right height="45%" width="45%"}
In February of 2020, I had just finished an overhaul of Poke My Balls. I wanted something to work on. Remembering the state of this project when I left it 2 years prior, I decided to restart entirely. I didn't want to work around issues and use band-aids. I wanted the game to be fun. I started with the launching mechanic. Rather than up and down buttons to angle the dog, I used a dragging system, that way you could easily line up shots and control the power of them.

<iframe width="560" height="315" src="https://www.youtube.com/embed/rx-Eqx3rSQ0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
----

By now I had been exposed to the idea of scope creep. Ideas in my head come faster than I can speak them, so there was no way I could add them all it at the rate they would bubble up. I decided to make a planning document. This way I could have a good stopping point, something I learned the importance of from Poke My Balls. The end goal was 100 levels, 10 mechanics, a dynamic camera. There would be the 100 level "campaign" and then hand-picked circuits and a mode with infinite levels, re-purposing the levels from the campaign. The random level mode was reminiscent of a Voodoo Games game. I also planned on making a level editor. I set the due date as July 10th, 2021. I felt I could easily finish all of this in a year and a half.  

![new-image-left](/assets/images/launch-my-dog/SE Screenshot 5.png){: .align-left height="45%" width="45%"}
A year and a half is plenty of time for this sort of project-- if you are only working on the project. University, a pandemic, a sorry attempt at a social life, and other smaller projects along the way ate a considerable amount of time. This project was a slow burn. Along the way, I had to cut down the scope of the project. The goal was a tight, neat, properly functioning game. The level editor was the first to go. Random levels and circuits got cut. Some of the more extravagant mechanics were cut, and the level count was dropped from 100 to 50. This was every level could be unique, borrowing ideas but not geometry from other levels.

Since the scope was cut down, it allowed me to better focus on what already in the game. Because of that, there's some pretty cool programming in here. All of the physics were based on my high school AP physics equation sheet. There is adaptive trajectory prediction, meaning it works through different mediums, and through portals. There's accurate gravity zones. Portals are my personal favorite mechanic. They are physically accurate, and I used what I learned in linear algebra to build a shader that cuts the hot dog geometry and slices it at the portal, cloning it on the other side of the other portal.

<iframe width="560" height="315" src="https://www.youtube.com/embed/TJ6HugnHiuw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
----

Since the game was meant for mobile, and it had some physics operations that are expensive computationally, optimization was very important. The 2018 version had all the levels loaded simultaneously, only showing them when necessary. That was a dumb system. I leveraged Unity's scene management, and constructed a base scene, with all the UI and the main menu, and then loaded levels additively. This allows the game to push the physics harder, and make levels more complex.

After my spring finals in June of 2021, I had a few weeks of crunch, and a stressful 3 days of waiting for Google Play to review the game, it was released on the day I said it would be: July 10th, 2021. I got to sit back for a few days and watch my friends play through the game and have fun. That is such a rewarding feeling.

<iframe width="560" height="315" src="https://www.youtube.com/embed/Z0nJEmJ8Ms8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
----


## What I learned:
- Optimization is extremely important. Phones are getting more powerful, but that doesn't mean people have them.
- Scope creep is a beast, and a planning document is one of the best was to combat it. You can still cut the game down more, but you can't add more to it.
- Band-Aid solutions, and the plague of the work-around end up making a game unfun, and make working on a project a discouraging slog. Doing more work upfront, and getting it right before moving on, saves more time in the long run.
