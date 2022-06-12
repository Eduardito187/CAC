from Cryptodome.Cipher import AES
from binascii import b2a_hex, a2b_hex
 # La longitud de la clave debe ser de 16 (AES-128), 24 (AES-192) o 32 (AES-256) Bytes de longitud.
 # Actualmente, AES-128 es suficiente
key = 'abcdefghigklmnop'
 # El contenido cifrado debe tener hasta 16 caracteres, por lo que el empalme de espacio
def pad(text):
  while len(text) % 16 != 0:
    text += ' '
  return text
 
 # Realice el algoritmo de cifrado, el modo ECB del modo y pase la clave secreta de 16 bits superpuesta
aes = AES.new(key.encode(), AES.MODE_ECB)
 # Contenido encriptado, aquí debe convertir la cadena a bytes
text = 'hello'
 # Realice el empalme de contenido de caracteres de 16 bits y páselos a la clase de cifrado, el resultado es el tipo de byte
encrypted_text = aes.encrypt(pad(text).encode())
encrypted_text_hex = b2a_hex(encrypted_text)
print(encrypted_text,encrypted_text_hex)
 
 
 # Aquí es para verificar si el byte se puede convertir en una cadena y si el descifrado es exitoso
 # En realidad, a es encrypted_text, que es el contenido cifrado
 # Utilice el objeto aes para descifrar, convertir el tipo de byte en tipo str e ignorar el código de error
de = str(aes.decrypt(a2b_hex(encrypted_text_hex)), encoding='utf-8',errors="ignore")
 # Obtenga la longitud de la cadena desde 0 hasta el contenido de texto de str.
print(de[:len(text)])