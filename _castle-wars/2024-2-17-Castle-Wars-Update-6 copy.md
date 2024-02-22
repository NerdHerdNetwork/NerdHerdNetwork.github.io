---
layout: single
title:  "Castle Wars Update 6 - Spawning Players, Split Screen, Controller Support, and Name Tags"
collection: castle-wars
permalink: /castle-wars/sprint6/
sidebar:
  nav: "castle-wars-nav"
---

_By Frank "Weekie" Podraza, Feb. 17, 2024_

<iframe width="560" height="315" src="https://www.youtube.com/embed/5KI33cSvkqs?si=P1U66OZGAPrpTJRo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
---

Split screen has been on a decline for a while, but it's not hard at all to implement if you do it right. I decided it needed to be tackled close to the start of the prototype so that it would not be a hassle later. 

A player pawn gets spawned for each player in the game, and we attach player drivers (scripts that send input) to each locally controlled player. This way we can control the players on our instance, but don't need to worry about controlling remote players since we wouldn't be able to do that anyways.

Hopefully, y'all enjoy the video, it was fun to make!
- Frank