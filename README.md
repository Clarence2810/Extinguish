[![](https://poggit.pmmp.io/shield.state/Extinguish)](https://poggit.pmmp.io/p/Extinguish)
<a href="https://poggit.pmmp.io/p/Extinguish"><img src="https://poggit.pmmp.io/shield.state/Extinguish"></a>
[![](https://poggit.pmmp.io/shield.api/Extinguish)](https://poggit.pmmp.io/p/Extinguish)
<a href="https://poggit.pmmp.io/p/Extinguish"><img src="https://poggit.pmmp.io/shield.api/Extinguish"></a>

# How to install?
##### How to install?<br/>
- `Download` This Plugin<br/>
- Put `Extinguish.phar` in plugin folder<br/>
- `Restart` your server or do `/reload` and you can now use extinguish<br/>

 **If theres error or issue please open your github then open issue then say the error**<br/>
# Plugin Information
- **Im gonna rescue you from burning!**
## How its working? Read or Watch This
- If you are burning or on fire you can do /extinguish to remove the fire
- Also if you are not on fire it will tell that you're not even on fire or burning
- You can also do /extinguish [player] it will extinguish player no need for sudo<br/>
**Example:** /extinguish Steve<br/>

[![Youtube Video Preview](https://media.discordapp.net/attachments/742376986072055929/752555011929669674/fire-extinguishers-firefighting-conflagration-fire-4e48d466134b3144b32996839d8d57c0.png?width=406&height=406)](https://www.youtube.com/watch?v=XWZarkl4oPw)

**Command:** `/extinguish`<br/>
**Usage:** `/extinguish [player]` [ ] Optional<br/>
**Aliases:** `ext`<br/>
**Permissions:** <br/>
  `extinguish.command` - **You can extinguish your self** <br/>
  `extinguish.command.other` - **You can extinguish other player** <br/>
# Config
### Config.yml

############################## GENERAL MESSAGES ##############################

#If player sent extinguish command but dont have permission<br/>
`no-permission: §cYou dont have permission to run extinguish command!`<br/>

#If sender dont have permission on extinguishing other player:<br/>
`other-no-permission: §cYou dont have permission to extinguish other player!`<br/>

############################## EXTINGUISHING YOUR SELF ##############################

#If player sent extinguish command but not on fire<br/>
`not-on-fire: §cYou're not even on fire how im gonna extinguish you?`<br/>

#Success Sending Extinguish Command<br/>
`extinguished-success: §aYou've been extinguished COOL!`<br/>

############################## EXTINGUISHING OTHER PLAYER ##############################

#When player is offline or not extist<br/>
`player-not-found: §c[RADAR] I can't find that player please specify it!`<br/>

#If player is not on fire | Variable: {player} - who is the player you want to get extinguished<br/>
`other-not-on-fire: §c{player} is not even on fire dont trick me`<br/>

#Success extinguished player<br/>
#Variable: {sender} - Who run the command to extinguish other player<br/>
`player-extinguished-success: §aYou've been extinguished by {sender} COOL RIGHT!`<br/>
#Variable: {player} - who get extinguished<br/>
`sender-extinguish-success: §aYou extinguished {player} nice!`<br/>

############################## COOLDOWN SYSTEM ##############################

#If you wanted to have cooldown to run extinguish command | True = theres cooldown and Anything you type = theres no cooldown<br/>
`command-cooldown: true`<br/>
#If you setted command-cooldown in true type a second how long that player can run again the extinguish command<br/>
`extinguish-cooldown: 10`<br/>

#When sender is on cooldown | Variable: {remaining} - How long can run again the extinguish<br/>
`on-cooldown: §cYou are currently at {remaining}seconds(s) cooldown!`<br/>

#When player is in cooldown this will be sended to sender if the player is specified to get extinguish<br/>
#Variable: {remaining} - How long can run again the extinguish<br/>
#Variable: {player} - The player specified on sender comman<br/>
`other-on-cooldown: §c{player} is currently at {remaining}second(s) cooldown!`

# Updates
 - Adding optional cooldown `v2.0`
 - Adding optional specify player `v1.2`
 - Cleaning codes `v1.0`
 - Created plugin `v1.0`
