# 🚀 Recargo Automatico CRM de SPLYNX
Este sistema fue diseñado para mejorar el proceso interno de una empresa donde me encontraba trabajando, y permite la provisión de pagos a través de un archivo de Excel que realiza peticiones hacia el CRM de Splynx. Debido a que la URL de la empresa es confidencial, SPLYNX tiene una demo del CRM que permite realizar pruebas, omitiendo ciertos parámetros. Para acceder a la demo, puedes hacerlo a través del siguiente enlace: https://demo.splynx.com/.

### Dependencias/Requisitos previos
Para instalar el sistema, es necesario contar con PHP 8, y se puede utilizar XAMPP para ello.

## Instalación / Primeros pasos
1 - Abrir la terminal de Git Bash y clonar el repositorio con el siguiente comando:
```shell
git clone git clone https://github.com/dmarquezsv/recargo_automatico_splynx.git
cd recargo_automatico_splynx/
code .
```
2 - Ejecutar el proyecto en el navegador, lo que nos llevará a la página de inicio de sesión.
```shell
http://localhost/recargo_automatico_splynx/
```
3 - Iniciar sesión con las siguientes credenciales:<br>
- Usuario: <b>cobros@email</b><br>
- Contraseña: <b>C$b33n3tC</b><br>

![image](https://user-images.githubusercontent.com/94775277/228102103-d3b38ab4-642d-4403-af00-ba357d263d01.png)

<br>

4 - Una vez iniciada la sesión, podremos subir un archivo de Excel con los pagos correspondientes. Para hacerlo, buscamos el archivo en el proyecto llamado "payment"  lo abrimos. Aunque en la demo no se pueden cambiar los parámetros, sí es posible modificar el correo electrónico para mostrar el funcionamiento del correo electrónico.

![image](https://user-images.githubusercontent.com/94775277/228102708-e44fea96-d93b-45b3-a4a1-4aa75e760c66.png)
<br>

5 - Después de hacer el cambio, subimos el archivo y hacemos clic en el botón "Importar datos". <br>

![image](https://user-images.githubusercontent.com/94775277/228104051-9b993c4b-b516-4434-87f4-931b8f0428f4.png)
<br>
![image](https://user-images.githubusercontent.com/94775277/228104107-adcb1562-dc81-44a6-a975-96d859dd0c2f.png)

6 - Luego nos dirigimos al CRM de Splynx con las siguientes credenciales:
 - Usuario: <b>admin</b>
 - Contraseña: <b>admin</b>
 
 ![image](https://user-images.githubusercontent.com/94775277/228103311-91ebda18-a3b8-475f-ae95-efa1fbd1fdc7.png)
 <br>
 7 - Buscamos el apartado "Customers – List". <br>
 
![image](https://user-images.githubusercontent.com/94775277/228103628-9b79fbd2-3228-43d4-bba8-ca5105493f16.png)
<br>

 8 - Buscamos el usuario con el ID 1 y una vez dentro de su perfil, buscamos el apartado "Billing". Luego hacemos clic en la pestaña "Finance documents" y filtramos por "payment".
 
 ![image](https://user-images.githubusercontent.com/94775277/228103832-01271a39-8c66-49e4-baef-51f277e7384a.png)
 <br>
 
 9 - Verificamos el pago y con esto se finaliza el proceso correspondiente.
 <br>
 ![image](https://user-images.githubusercontent.com/94775277/228104234-c1e139cb-0ef6-485e-bd20-88cdca637a1b.png)
 <br>
 Este sistema es ideal para empresas que necesitan una manera sencilla y automatizada de registrar pagos de clientes. Además, puede ser personalizado para adaptarse a las necesidades específicas de cada empresa. Si necesita ayuda con la instalación o personalización del sistema, no dude en ponerse en contacto.
 
 ### Tecnologías / Construido con
- ✨ PHP
- ✨ PHPExcel
- ✨ PHPMAILER
- ✨ GuzzleHttp

 



