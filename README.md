# nano-stats
Calculate Nanowrimo Stats for the St Louis Region

## Stats
There are 2 options.  The default (either ```./stats``` or ```./stats --human```) -
```
> ./stats --human

USA :: Missouri :: St. Louis has 857 participants, with 60 halos and has raised $1,480.00.  
Collectively the region has written 3017708 words.
```
If you run with the *--json* option (```./stats --json```) the script will read "nanowrimo-stats.json" in the current directory and insert stats into the appropriate place in the file.  The new contents will be written to standard output rather than overwriting the file so the script is non-destructive.  You can send the output into a file if you want - 
```
./stats --json > new-file.json
```

## Rank

To see how the region stacks up in comparison to everyone else doing Nano,
```
> ./rank

St Louis is at rank 41 on the word count scoreboard.
```

