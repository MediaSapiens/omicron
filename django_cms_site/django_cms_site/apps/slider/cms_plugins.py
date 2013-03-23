# -*- coding: utf-8 -*-
from cms.plugin_base import CMSPluginBase
from cms.plugin_pool import plugin_pool
from django_cms_site.apps.slider.models import SliderPlugin


class CMSSliderPlugin(CMSPluginBase):
    model = SliderPlugin
    name = u"Slide"
    render_template = "slider/base.html"

    def render(self, context, instance, placeholder):
        context['slide'] = instance.slide
        context['object'] = instance
        context['placeholder'] = placeholder
        return context

plugin_pool.register_plugin(CMSSliderPlugin)
