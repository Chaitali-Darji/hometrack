$(function () {

  $("#team-email-tag").tagsinput();

  $('.phone-number').inputmask('(999) 999-9999',{
    removeMaskOnSubmit: true, 
    autoUnmask: true
  });

  let autocomplete;
  let address1Field;
  let address2Field;

  let billingautocomplete;
  let billingaddress1Field;
  let billingaddress2Field;
});

function initAutocomplete() {

    address1Field = document.querySelector("#address1");
    address2Field = document.querySelector("#address2");
    // Create the autocomplete object, restricting the search predictions to
    // addresses in the US and Canada.
    autocomplete = new google.maps.places.Autocomplete(address1Field, {
      componentRestrictions: { country: ["us"] },
      fields: ["address_components", "geometry"],
      types: ["address"],
    });

    // When the user selects an address from the drop-down, populate the
    // address fields in the form.
    autocomplete.addListener("place_changed", fillInAddress);

    billingaddress1Field = document.querySelector("#billing_address1");
    billingaddress2Field = document.querySelector("#billing_address2");
    // Create the autocomplete object, restricting the search predictions to
    // addresses in the US and Canada.
    billingautocomplete = new google.maps.places.Autocomplete(billingaddress1Field, {
      componentRestrictions: { country: ["us"] },
      fields: ["address_components", "geometry"],
      types: ["address"],
    });

    // When the user selects an address from the drop-down, populate the
    // address fields in the form.
    billingautocomplete.addListener("place_changed", fillInBillingAddress);
}

function fillInAddress() {

    // Get the place details from the autocomplete object.
    const place = autocomplete.getPlace();
    let address1 = "";
    let postcode = "";

    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    // place.address_components are google.maps.GeocoderAddressComponent objects
    // which are documented at http://goo.gle/3l5i5Mr

    for (const component of place.address_components) {
      const componentType = component.types[0];

      switch (componentType) {
        case "street_number": {
          address1 = `${component.long_name} ${address1}`;
          break;
        }

        case "route": {
          document.querySelector("#address2").value = component.long_name;
          break;
        }

        case "postal_code": {
          document.querySelector("#zip").value = component.long_name;
          break;
        }

        case "locality":
          document.querySelector("#city").value = component.long_name;
          break;

        case "administrative_area_level_1": {
          document.querySelector("#state").value = component.short_name;
          break;
        }
      }
    }

    document.querySelector("#latitude").value = place.geometry.location.lat();
    document.querySelector("#longitude").value = place.geometry.location.lng();

    address1Field.value = address1;
    // After filling the form with address components from the Autocomplete
    // prediction, set cursor focus on the second address line to encourage
    // entry of subpremise information such as apartment, unit, or floor number.
    address2Field.focus();

}

function fillInBillingAddress() {

    // Get the place details from the autocomplete object.
    const billingplace = billingautocomplete.getPlace();
    let billingaddress1 = "";
    let billingpostcode = "";

    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    // place.address_components are google.maps.GeocoderAddressComponent objects
    // which are documented at http://goo.gle/3l5i5Mr

    for (const component of billingplace.address_components) {

      const componentType = component.types[0];

      switch (componentType) {

        case "street_number": {
          billingaddress1 = `${component.long_name} ${billingaddress1}`;
          break;
        }

        case "route": {
          document.querySelector("#billing_address2").value = component.long_name;
          break;
        }

        case "postal_code": {
          document.querySelector("#billing_zip").value = component.long_name;
          break;
        }

        case "locality": {
          document.querySelector("#billing_city").value = component.long_name;
          break;
        }

        case "administrative_area_level_1": {
          document.querySelector("#billing_state").value = component.short_name;
          break;
        }

      }
    }

    document.querySelector("#billing_latitude").value = billingplace.geometry.location.lat();
    document.querySelector("#billing_longitude").value = billingplace.geometry.location.lng();

    billingaddress1Field.value = billingaddress1;
    // After filling the form with address components from the Autocomplete
    // prediction, set cursor focus on the second address line to encourage
    // entry of subpremise information such as apartment, unit, or floor number.
    billingaddress2Field.focus();
  }