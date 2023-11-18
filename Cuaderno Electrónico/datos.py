import os

def create_lab_folder(folder_name):
    # Crea la carpeta principal del lab
    os.mkdir(folder_name)
    
    # Crea subcarpetas dentro del lab folder
    subfolders = ['codigo', 'datos', 'notebooks', 'resultados', 'utilidades', 'documentacion', 'imagenes']
    for subfolder in subfolders:
        os.mkdir(os.path.join(folder_name, subfolder))
    
    print(f"Lab folder '{folder_name}' creado exitosamente.")

# Nombre de tu lab folder
lab_folder_name = "MiLabFolder"

# Crea el lab folder
create_lab_folder(lab_folder_name)
