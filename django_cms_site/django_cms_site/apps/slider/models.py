# -*- coding: utf-8 -*-

from django.db import models
from cms.models import Page, CMSPlugin


class Slide(models.Model):
    image = models.ImageField(upload_to="slider_images", max_length=255)
    title = models.CharField(max_length=255)
    text = models.TextField()
    page = models.ForeignKey(Page)
    link_text = models.CharField(max_length=255)

    def __unicode__(self):
        return self.title


class SliderPlugin(CMSPlugin):
    slide = models.ForeignKey(Slide)
