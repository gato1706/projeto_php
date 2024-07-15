import pyautogui
import subprocess
import time
import pandas as pd

url_form = "http://localhost/Login/view/CadLivros.php"

subprocess.run(r"C:\Program Files (x86)\Microsoft\Edge\Application/msedge.exe")

time.sleep(1)

pyautogui.write(url_form)

pyautogui.press('enter')

tabela_cadastro = pd.read_excel('LivrosCatalogados.xlsx')

time.sleep(1)

for linha in tabela_cadastro.index:

    nome = tabela_cadastro.loc[linha,"Titulo"]

    pyautogui.write(str(tabela_cadastro.loc[linha, "Titulo"]))
    pyautogui.press('tab')
    time.sleep(1)
    
    pyautogui.write(str(tabela_cadastro.loc[linha, "Autor"]))
    pyautogui.press('tab')
   
    time.sleep(1)

    pyautogui.write(str(tabela_cadastro.loc[linha, "Editora"]))
    pyautogui.press('tab')
    time.sleep(1)

    pyautogui.write(str(tabela_cadastro.loc[linha, "Ano de Publicação"]))
    pyautogui.press('tab')
    time.sleep(1)

    pyautogui.write(str(tabela_cadastro.loc[linha, "Idioma"]))
    pyautogui.press('tab')
    time.sleep(1)

    pyautogui.write(str(tabela_cadastro.loc[linha, "Número de Páginas"]))

    time.sleep(1)


    