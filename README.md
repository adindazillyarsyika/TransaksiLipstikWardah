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