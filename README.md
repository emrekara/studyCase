# studyCase
## Proje Açıklaması
2 ayrı kur bilgisi veren API'lerden (aşağıda mock server yanıtlarını bulabilirsin) EUR/USD/GBP kur bilgilerini alarak karşılaştırıp daha ucuz olanını ekrana basacak bir web uygulama geliştirilecek.

Burada kur bilgisi veren şirketler Adapter Patterni ile geliştirilecek ki 3. bir kur bilgisi veren API'nin (provider 3) de eklemesi  sadece API tanıtımı ile oluşsun. Uygulamanın başka yerinde herhangi bir değişikliğe ihtiyaç duymadan bu 3 kur bilgisi veren API'den en ucuzunu ana sayfada göstersin.

Bu verileri APIlerden çekmek için command (console) yazılacak ve veritabanına kaydedecek. Anasayfada veritabanından okuyarak verileri gösterecek. İhtiyaç halinde önyüzde Bootstrap ve Jquery kullanılabilir.

API1 : https://run.mocky.io/v3/e5056fe0-be6f-48ba-8b51-52ff28f54372

RESPONSE
```
{
  "result": {
    "0": {
      "name": "dolar",
      "price": "32.15",
      "symbol": "$",
      "shortCode": "USD"
    },
    "1": {
      "name": "euro",
      "price": "35.17",
      "symbol": "€",
      "shortCode": "EUR"
    },
    "2": {
      "name": "sterlin",
      "price": "40.07",
      "symbol": "£",
      "shortCode": "GBP"
    }
  }
}
```

API2 : https://run.mocky.io/v3/7698a8d8-ec93-4df2-9181-ff0504078f81
RESPONSE
```
{
  "result": {
    "0": {
      "fullname": "dolar",
      "amount": "32.32",
      "symbol": "$",
      "code": "USD"
    },
    "1": {
      "fullname": "sterlin",
      "amount": "40.08",
      "symbol": "£",
      "code": "GBP"
    },
    "2": {
      "fullname": "euro",
      "amount": "35.09",
      "symbol": "€",
      "code": "EUR"
    }
  }
}
```

## Proje Kurulumu

İlk olarak composer kurulmalı ve veritabanı oluşturuluyor
```
composer install
php artisan migrate
```
## Proje Çalıştırma

Browser tarafında kontrol yapabilmek için 


## Admin

Sistemde yer alan geçmiş kurların listesini ve yeni api eklemek için kullanılır.

### Admin Kullanıcısı

```
email: info@etiya.com
password: Etiya2024.,
```

