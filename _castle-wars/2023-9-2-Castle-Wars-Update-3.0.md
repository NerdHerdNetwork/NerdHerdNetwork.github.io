---
layout: single
title:  "Castle Wars Update 3.0 - Steam Lobbies, Fishnet Networking, and a lot of Headaches"
collection: castle-wars
permalink: /castle-wars/sprint3/0/
sidebar:
  nav: "castle-wars-nav"
---

_By Frank "Weekie" Podraza, Sep. 2, 2023_

Okay soooooo It's a been while *"Classic Frank"*. I am back though, and today is finally the day when we get to networking.... Kind of.

I've been researching networking solutions for a long time, my aim is to create a peer-to-peer like system so that I do not need to pay for dedicated servers. In order to do this cheapy, and more importantly, securely, I've decided to go with Steamworks Matchmaking and their lobby/relay system to organize games and I'll be using Fishnet to actually connect everyone together. 
This post is about the lobby system, the lobby browser, and why I am using steam's lobby system. Unfortunately the actual netcode doesn't exist yet. This post is entirely about lobbies, and organizing games, but no real multiplayer. The next couple-five devlogs will be about the actual netcode. If netcode is what you're looking for, get subscribed, otherwise let's get this devlog going.

## Catching up
I said I was going to do networking next in, oh god, August 2022? Since then I made the [**Databox Settings Video**](), the [**Enemies Overhaul Video**](), and the [**Sword Overhaul Video**](). I then did Bug-Fixing Week 2023! Whoo! Yay! It was so boring. Then I started on netcode research as soon as I finished B.F.W. 2023 (which was in late July). I found a couple tutorials I wanted to follow, made by [**Winterbolt games**](https://www.youtube.com/@winterboltgames). They were the [**Fishnet Basics Video**](), and [**Fishnet Multiplayer FPS Tutorial**](). I saved the links, and that night started watching the basics video. I cracked a claw and started taking notes on the basics video. I got about a 6th of the way into when I realized that this is all assuming connections were on the same computer. You might not understand why that's bad, regardless: Fuck!

## Transports
Now the information in these tutorials is still valuable. On the TCP/IP Stack this is all information pertaining to the application layer, which I am going to need eventually, but how do I connect people? over LAN? over that open, sea-faring internet? *Without getting into the TCP/IP Stack the application layer in on the top, and that's what most of our time is going to be spent working with, however we need to interact with the transport layer, so that we can actually send application messages to other hosts on the network. Because of how the stack is setup, once we package our message as a transport-layer segments, we can just send them into the network and they'll do what we want them to on the other side.* So I needed to decide on transports.

This glosses over the 3-day headache which was me falling into the "rookie hole", a lot of google searches about how to handle NAT, punching through it, how do I do peer-to-peer without exposing everyone's IPs? The existential dread of "I should just write my own networking solution, That's what among us did. That's what battlebit did." I don't want to be tied to one platform so I'll need to do that anyway, right?

After coming out of that stupor, I decided that I was going to implement 2 transports, [**FishySteamworks**](https://github.com/FirstGearGames/FishySteamworks), and [**Fishnet Discovery**](https://github.com/Abdelfattah-Radwan/Fish-Networking-Discovery). These 2 transports cover Steam Networking, and LAN. So why those two?

## Steamworks
LAN is something I wanted to add because it seems quick, and I had a lot of fun playing LAN Halo back in the day. It's also low-stakes for information exposure since people can only connect from your local network.Steamworks came from the decision that, this is going to be a steam game first. If I end up DJ-Khaled-Suffering-from-Success, then I will put the work into porting this to Xbox, Playstation, and Switch/Switch 2. Steam also provides the Steam Relay service. The Relay acts a mediator in a peer-to-peer system which masks all client's IPs so they can't be hacked, swatted, DDOS'd, etc. Which means that it's considerably more secure.

[Relay Diagram]

I downloaded the necessary assets from their respective github pages, imported steamworks into the project, and set the steam ID as 480. [**Spacewar**](https://steamdb.info/app/480/charts/). I am going to have so many hours in spacewar by the end of this. If you want to see how long I've spent, check my steam profile and see if the spacewar hours have gone up.

[Spacewar hours]

I'll be implementing LAN lobbies later, but for now let's start actually doing the work.

## Lobby Browser
I quickly threw together this browser UI, and the panel to create a game. Then I rigged up the controller support for it, and wrote a quick function to generate random lobby info, to temporarily populate the server list. I also had to update the value select UI element to select from any type of variable, rather than just floats.

[Lobby Browser screen]

I wrote a function that pulls lobby data for the steam ID, and populates the browser with it. Since this is a public steamID, we will get lobbies with weird, and often offensive names. I've seen lobbies named the N-word, the F-slur, the usual slew of  "boobsInXXX" "TitsLobby", and "assGame".

I can't control the results coming back yet (though that will be implemented), so except for that the lobby browser was working. 

## Lobby Screen
I also threw together a lobby screen, which allowed the owner to start the game, and showed a list of players in the game. To test, I got my old Razer Laptop, setup a company steam profile, and loaded up the game to setup a lobby. I also made it so you can join lobbies from the browser, as well as see game metadata in the browser.

[Lobby Screen]

The general setup of the lobby screen is that the owner can edit game settings and start the game, and everyone can see game settings, assigned themselves to teams, and inspect players. Depending on the number of teams, there are different panels which show the team lists. Either Free-for-all, 2 teams, 3 teams, and 4 teams. There a buttons to join/leave teams. 

I store lists of who is in which team, which populates the team lists. There is also a pull-up screen which allows you to inspect players. If you're the owner, you can also kick or promote players.

I had a 1-day headache of realizing that I needed a way to assign local players to different teams. What I came up with is that when a steam account has multiple local players, those local players join their teams using the D-pad, and there is a member metadata tag to store all local player teams.

## Lobby Screen Controller Support
Somehow what took the longest to get right was controller support for this lobby screen. Because the UI changes dynamically, and on its own schedule, I needed to build quite a few checks into it to ensure that when nodes get removed, the player can still use the menu, and the controller support doesn't fall into the void.

There's also a lot of dynamic UI elements, the team panels having variable number of players, the join/leave team buttons not being necessary for multiple local players. What happens when a player moves teams while you're inspecting them? What happens when the number of teams changes and you're selecting a team which doesn't exist anymore.

It took close to 3 days to build in all of these resiliency checks. Each time I thought I knew all of them another edge case would pop up. Take this as your friendly reminder that 1 week of work will always end up being 3.

## Closing
So that's steamworks, and lobbies, next time I'm going to be implementing netcode. I have like 6 videos planned. Stuff like: LAN Discovery that I mentioned earlier, making simple maps for testing, adding in features like a killfeed, or chat, or gamemodes. While you wait there's always the previous castle wars devlog posts. I have 2 games on the app store and google play which I'd love you to check out, and other than that, I'll see you later.

