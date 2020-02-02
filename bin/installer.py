import sys, os
from colorama import init, AnsiToWin32, Fore, Back, Style

init(wrap=False)
stream = AnsiToWin32(sys.stderr).stream

def banner():
	os.system('clear')
	
	print (
	r'''
▒█▀▀█ █▀▀█ █▀▀█ █▀▀█ █▀▀█ █░░█ ▒█▀▀▀ █▀▀█ █▀▀█ █▀▄▀█ █▀▀ █░░░█ █▀▀█ █▀▀█ █░█ 
▒█░▄▄ █▄▄▀ █▄▄█ █░░█ █░░█ █▄▄█ ▒█▀▀▀ █▄▄▀ █▄▄█ █░▀░█ █▀▀ █▄█▄█ █░░█ █▄▄▀ █▀▄ 
▒█▄▄█ ▀░▀▀ ▀░░▀ █▀▀▀ █▀▀▀ ▄▄▄█ ▒█░░░ ▀░▀▀ ▀░░▀ ▀░░░▀ ▀▀▀ ░▀░▀░ ▀▀▀▀ ▀░▀▀ ▀░▀''')

print(Fore.MAGENTA, file=stream)
banner()

print('\t\t\t\t\t\t\tversion 0.7.0\n\n')

print('Change operation:\n')
print('[1]: Install composer\'s dependencies')

operation = input('Operation: ')

if operation == '1':
        work_dir = input('Please intput you work directory (where composer.json): ')
          
        os.chdir(work_dir)
        
        dir = os.path.abspath(os.curdir)
        
        print(Fore.GREEN, file=stream)
        print('Installing dependencies...')
        
        print(Fore.WHITE, file=stream)
        os.system('composer install')
else:
      print(Fore.RED, file=stream)
      print('Invalid operation :(')

print(Fore.GREEN, file=stream)
input("Press any key to exit...")

