# Kasir Web-App Fullstack

Aplikasi kasir simple berbasis website dengan **MySQL** sebagai database

- Stack Used
  - Frontend (Jquery & Native JS)
  - Backend (Laravel / PDO (Resource File)
- Preview Aplikasi
  - Frontend : https://www.kerjaiin.com/kasir
  - Backend  : https://www.kerjaiin.com/backend-kasir
    - List Api 
      - data master :
        - https://www.kerjaiin.com/backend-kasir/api/barang/search/{keyword} (search)
        - https://www.kerjaiin.com/backend-kasir/api/barang/get/all (Get data without paginate)
        - https://www.kerjaiin.com/backend-kasir/api/barang (Get data with paginate)
        - https://www.kerjaiin.com/backend-kasir/api/barang/{id}/edit (Get data by id)
        - https://www.kerjaiin.com/backend-kasir/api/barang/new/data (Insert data)
        - https://www.kerjaiin.com/backend-kasir/api/barang/{id} (Update data by id)
        - https://www.kerjaiin.com/backend-kasir/api/barang{id} (Delete data by id)
        
      - transaksi
        - https://www.kerjaiin.com/backend-kasir/api/total
        - https://www.kerjaiin.com/backend-kasir/api/trx
# ERD 
  ![Gambar ERD](Resource/Erd_Kasir.png)
