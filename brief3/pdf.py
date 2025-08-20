import tkinter as tk
from tkinter import filedialog, messagebox, scrolledtext
import os
import shutil

class PDFRenamerApp:
    def __init__(self, root):
        self.root = root
        self.root.title("Renombrador de PDFs")
        self.root.geometry("700x500")

        self.files = []
        self.destination_folder = ""

        # Botón para seleccionar archivos
        self.select_button = tk.Button(root, text="Seleccionar PDFs", command=self.select_files)
        self.select_button.pack(pady=5)

        # Mostrar archivos seleccionados
        self.file_list_label = tk.Label(root, text="No hay archivos seleccionados.", fg="blue", wraplength=650, justify="left")
        self.file_list_label.pack()

        # Mostrar carpeta origen
        self.source_label = tk.Label(root, text="Carpeta de origen: Ninguna", fg="darkgreen", wraplength=650, justify="left")
        self.source_label.pack(pady=2)

        # Botón para seleccionar carpeta de destino
        self.dest_button = tk.Button(root, text="Seleccionar carpeta de destino", command=self.select_destination)
        self.dest_button.pack(pady=5)

        # Mostrar carpeta destino
        self.dest_label = tk.Label(root, text="Carpeta de destino: No seleccionada", fg="darkred", wraplength=650, justify="left")
        self.dest_label.pack()

        # Input de nombres nuevos
        self.name_input = scrolledtext.ScrolledText(root, height=10, width=80)
        self.name_input.pack(pady=10)
        self.name_input.insert(tk.END, "Introduce los nuevos nombres aquí (uno por línea)...")

        # Botón de renombrar
        self.rename_button = tk.Button(root, text="Renombrar y Guardar PDFs", command=self.rename_files)
        self.rename_button.pack(pady=10)

    def select_files(self):
        self.files = filedialog.askopenfilenames(filetypes=[("PDF files", "*.pdf")])
        if self.files:
            filenames = [os.path.basename(f) for f in self.files]
            self.file_list_label.config(text="Archivos seleccionados:\n" + "\n".join(filenames))
            common_path = os.path.dirname(self.files[0])
            self.source_label.config(text=f"Carpeta de origen: {common_path}")
        else:
            self.file_list_label.config(text="No hay archivos seleccionados.")
            self.source_label.config(text="Carpeta de origen: Ninguna")

    def select_destination(self):
        folder = filedialog.askdirectory()
        if folder:
            self.destination_folder = folder
            self.dest_label.config(text=f"Carpeta de destino: {self.destination_folder}")
        else:
            self.destination_folder = ""
            self.dest_label.config(text="Carpeta de destino: No seleccionada")

    def rename_files(self):
        new_names = self.name_input.get("1.0", tk.END).strip().splitlines()

        if not self.files:
            messagebox.showwarning("Advertencia", "Primero selecciona archivos PDF.")
            return

        if not self.destination_folder:
            messagebox.showwarning("Advertencia", "Selecciona una carpeta de destino.")
            return

        if len(new_names) != len(self.files):
            messagebox.showerror("Error", f"El número de nombres ({len(new_names)}) no coincide con los archivos seleccionados ({len(self.files)}).")
            return

        try:
            for i, file in enumerate(self.files):
                new_filename = os.path.join(self.destination_folder, new_names[i] + ".pdf")
                shutil.copy(file, new_filename)
        except Exception as e:
            messagebox.showerror("Error", f"Error al copiar y renombrar archivos:\n{e}")
            return

        messagebox.showinfo("Éxito", f"Se renombraron y guardaron {len(self.files)} archivos en:\n{self.destination_folder}")
        self.files = []
        self.name_input.delete("1.0", tk.END)
        self.file_list_label.config(text="No hay archivos seleccionados.")
        self.source_label.config(text="Carpeta de origen: Ninguna")

# Ejecutar app
if __name__ == "__main__":
    root = tk.Tk()
    app = PDFRenamerApp(root)
    root.mainloop()
