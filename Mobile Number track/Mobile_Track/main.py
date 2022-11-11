# Import libraries for number and country
import phonenumbers
from myphone import number
import opencage
import folium
from phonenumbers import geocoder

pepnumber = phonenumbers.parse(number)
location = geocoder.description_for_number(pepnumber, "en")
print(location)

# For mobile carrier
from phonenumbers import carrier
service_provider = phonenumbers.parse(number)
print(carrier.name_for_number(service_provider, "en"))

# For location of number in google map
from opencage.geocoder import OpenCageGeocode
key = 'ad2a80dd1bb643f7af79132672bb1a34'
geocoder = OpenCageGeocode(key)
query = str(location)
results = geocoder.geocode(query)
# print(results)

lat = results[0]['geometry']['lat']
lng = results[0]['geometry']['lng']

print(lat, lng)

# For map
myMap = folium.Map(location=[lat, lng], zoom_start= 9)
folium.Marker([lat, lng], popup=location).add_to(myMap)
myMap.save("mylocation.html")
