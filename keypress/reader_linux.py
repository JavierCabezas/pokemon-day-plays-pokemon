from subprocess import call
import sys

call(['sh /var/www/html/pokemondayplayspokemon/keypress/script/'+sys.argv[1]], shell=True)