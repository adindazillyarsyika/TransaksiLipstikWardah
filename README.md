# TransaksiLipstikWardah
situs distributor kosmetik 


# insert ke table prdouk

alter table produk change gambar_produk gambar_produk varchar (100);
UPDATE produk SET gambar_produk = "\"images/wardah-intanse-matte.jpg\"" 
WHERE Kode_produk = "988234";
UPDATE produk SET gambar_produk = "\"images/wardah-pallate.png\"" 
WHERE Kode_produk = "897544";
UPDATE produk SET gambar_produk = "\"images/wardah-matte-lipstik.jpg\"" 
WHERE Kode_produk = "455638";
UPDATE produk SET gambar_produk = "\"images/wardah-lipcream.jpg\"" 
WHERE Kode_produk = "209374";
UPDATE produk SET gambar_produk = "\"images/wardah-lipbalm-strawberry.jpg\"" 
WHERE Kode_produk = "203975";
UPDATE produk SET gambar_produk = "\"images/wardah-longlasting.jpg\"" 
WHERE Kode_produk = "123456";

alter table penjual add username varchar (20) NOT NULL;
alter table penjual add password varchar (20) NOT NULL;

UPDATE penjual SET username = "@asroh" , password="123456712"
WHERE ID_Penjual = "234825";
UPDATE penjual SET username = "@rangga" , password="12332198"
WHERE ID_Penjual = "334927";
UPDATE penjual SET username = "@pohon" , password="98778965"
WHERE ID_Penjual = "386332";
UPDATE penjual SET username = "@vena" , password="34575864"
WHERE ID_Penjual = "454213";
UPDATE penjual SET username = "@dilla" , password="64729103"
WHERE ID_Penjual = "734682";
UPDATE penjual SET username = "@dinda" , password="18181819"
WHERE ID_Penjual = "593111";

CREATE TABLE Online (
username varchar (20) NOT NULL,
password varchar (20) NOT NULL,
PRIMARY KEY (username)
);