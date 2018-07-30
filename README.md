Getting Started With Chaplean Social Buttons Bundle
===================================================

## Configuration: 

```yaml
chaplean_social_buttons:
    buttons:
        facebook:
            url:            null
            locale:         "fr_FR"
            send:           false
        twitter:
            url:            null
            locale:         "fr"
            message:        "Share it"
            text:           "Tweet"
            via:            "Chaplean"
            tag:            "Chap"
            # Optional
			class_a:        "some-class"
			class_i:        "some-class"
        googleplus:
            url:            null
            locale :        "fr"
        linkedin:            
            url:            null
            locale:         "fr_FR"
        pinterest:
            url:            null
```

## Include styles:

Files to include in layout

Require:
```html
    'bundles/chapleansocialbuttons/libs/bootstrap-social/bootstrap-social.css'
```

If bootstrap not included:
```html
    'bundles/chapleansocialbuttons/libs/bootstrap/dist/css/bootstrap.min.css' 
```

If not font-awesome is include:
```html
    'bundles/chapleansocialbuttons/libs/font-awesome/css/font-awesome.min.css'
```
